<?php

namespace App\Http\Controllers\Organizer;

use App\Organizer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Validator;
use Image;
use Mail;
use Illuminate\Support\Str;
class eventPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $states= array('AB' => 'Abia','AJ' => 'Abuja','AN' => 'Anambra','AD' => 'Adamawa','AK' => 'Akwa Ibom','BA' => 'Bauchi','BY' => 'Bayelsa', 'BE' => 'Benue',
        'BO' => 'Borno','CR' => 'Cross River','DE' => 'Delta','ED' => 'Edo','EK' => 'Ekiti','EB' => 'Ebonyi','EN' => 'Enugu', 'GO' => 'Gombe',
        'IM' => 'Imo','KN' => 'Kano','LA' => 'Lagos','NS' => 'Nassarawa','JI' => 'Jigawa','KB' => 'Kebbi','KD' => 'Kaduna','KG' => 'Kogi',
        'KT' => 'Katsina','KW' => 'Kwara','NR' => 'Niger','OG' => 'Ogun','ON' => 'Ondo','OS' => 'Osun','OY' => 'Oyo','PL' => 'Plateau',
        'RV' => 'Rivers','SO' => 'Sokoto','TA' => 'Taraba','YB' => 'Yobe','ZM' => 'Zamfara');

    public function index()
    {
        //
        $organizers=Organizer::find(auth('organizer')->user()->id);

        $events=$organizers->events;
        return view('organizer.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states=$this->states;
        return view('organizer.event.new',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if the event organizer is logged in
        try{
            $organizer=Organizer::find(auth('organizer')->user()->id);

            //validate request

            $message =[
                'event_title.required'=>"Please enter the title of the event",
                'event_title.unique'=>"event title is already taken",
                'event_title.unique'=>"please choose another title as this is already in use",
                'event_description.required'=>'Please write a longer description (at least 30 characters)',
                'event_location.required'=>'Select the location of your event',
                'event_start.required'=>'When will the event start?',
                'event_end.required'=>'When will the event end?',
                'event_poster.image'=>'File uploaded into an image:jpg,png,jpeg,x-png',
                'event_start.date'=>'Invalid date format (yyyy-mm-dd)',
                'event_end.date'=>'invalid date format (yyyy-mm-dd)',


                //other messages
            ];
            Validator::make($request->all(),[
                'event_title'=>'required|unique:events,title|regex:/^[\w., ]{3,225}$/i|unique:events,title',
                'event_description'=>"required|regex:/^[A-Za-z0-9?.,#-_ ]{100,225}$/i",
                'event_location'=>'required',
                'event_start'=>'required|date',
                'event_end'=>'required|date',
                'event_poster'=>'required|image',
            ],$message)->validate();

            //upload image
            $image=$request->file('event_poster');
            $imageNewName=time().'.'.$image->getClientOriginalExtension();

            $upload_folder='images/event/'.$imageNewName;

            Image::make($image)->resize(820,580,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($upload_folder);
            $event=Event::create([
                'title'=>$request->get('event_title'),
                'image'=>$imageNewName,
                'slug'=>Str::slug($request->get('event_title'),'-'),
                'start_date'=>strtotime($request->get('event_start')),
                'end_date'=>strtotime($request->get('event_end')),
                'description'=>$request->get('event_description'),
                'e_location'=>$request->get('event_location'),
            ]);
            if($event->save()){
                //if the events was successfully saved
                //add event to the organizer
                $event->organizer()->attach($organizer->id);
                //mail the admin about the new event request review
                //redirect the my events page
                Mail::send('mail.organizer.newEvent',function($message) use($event){
                    $message->to('efe@volleyball.ng');
                    $message->subject('New Event Created and Requesting a Review');
                    $message->from('volleyballdotngee@gmail.com','Volleyball.ng');
                });
                return redirect()->route('myEvents')->with('status','Your event was successfully created and is currently under review.');
            }



        }catch (ModelNotFoundException $e){
            //not logged in
            return 'access denied';
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //show a given event
        try{
            //find the event

            $event=Event::whereSlug($name)->firstOrfail();

            //event found
            return view('organizer.event.show',compact('event'));

        }catch (ModelNotFoundException $e){
            return view('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //find the event using the slug
        try{
            $event=Event::whereSlug($slug)->firstOrFail();
            //check if event manager created event
            $organizer=Organizer::find(auth('organizer')->user()->id);
            if($event->organizer->isEmpty() || ($event->organizer[0]->id!=$organizer->id)){
                return redirect()->route('organizerDashboard')->with('res','Access Denied');
            }
            $states=$this->states;
            return view('organizer.event.edit',compact('event','states'));
        }catch (ModelNotFoundException $e){
            return 'not Found';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //find the event using the slug

        try{

            $event=Event::whereSlug($slug)->firstOrFail();
            //validate request sent

            $message =[
                'event_title.required'=>"Please enter the title of the event",
                'event_description.required'=>'Please write a description for this event (at least 30 characters)',
                'event_description.min'=>'Please write a longer description of this event (at least 30 characters)',
                'event_description.regex'=>'Some characters in your description are not allowed',
                'event_location.required'=>'Select the location of your event',
                'event_start.required'=>'When will the event start?',
                'event_end.required'=>'When will the event end?',
                'event_poster.image'=>'File uploaded into an image:jpg,png,jpeg,x-png',
                'event_start.date'=>'Invalid date format (please use yyyy-mm-dd)',
                'event_start.prevdate'=>'Previous dates cannot be selected',
                'event_end.prevdate'=>'Previous dates cannot be selected',
                'event_end.date'=>'Invalid date format (please use yyyy-mm-dd)',
                'event_phone.regex'=>'Phone number format not allowed. use 080xxxxxxxx',



                //other messages
            ];
            Validator::make($request->all(),[
                'event_title'=>'required|regex:/^[\w.,\-\' ]{3,225}$/i',
                'event_description'=>"required|min:30|regex:/^[A-Za-z0-9?.,#-_ ]{30,}$/i",
                'event_location'=>'required',
                'event_start'=>'required|date|prevdate',
                'event_end'=>'required|date|prevdate',
                'event_poster'=>'required|image',
            ],$message)->validate();

            //upload image
            $image=$request->file('event_poster');
            $imageNewName=time().'.'.$image->getClientOriginalExtension();

            $upload_folder='images/event/'.$imageNewName;

            Image::make($image)->resize(820,580,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($upload_folder);

            //save and update the event
            $event->title=$request->get('event_title');
            $event->slug=Str::slug($request->get('event_title'),'-');
            $event->description=$request->get('event_description');
            $event->e_location=$request->get('event_location');
            $event->start_date=strtotime($request->get('event_start'));
            $event->end_date= strtotime($request->get('event_end'));
            $event->image=$imageNewName;
            $event->status='review';

            if($event->save()){
                //send mail to admin
                Mail::send('mails.organizer.newEvent',['event'=>$event],function($message) use($event){
                    $message->to('efe@volleyball.ng');
                    $message->subject('Event Approval');
                    $message->from('volleyballdotngee@gmail.com','Volleyball.ng');
                });
                return redirect()->route('myEvents')->with('status','Your event has been submitted for review.');
            }

        }catch (ModelNotFoundException $e){

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
