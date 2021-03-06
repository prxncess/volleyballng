<?php

namespace App\Http\Controllers\Admin;
use App\Team;
use App\Organizer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Notification;
use Illuminate\Support\Str;
use Validator;
use Image;
use App\Event;
use Mail;
use App\Notifications\newEventOpen;
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
        $events=Event::paginate(10);
        //return $events;
        return view('admin.events.index',compact('events'));
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
        return view('admin.events.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $re
     *
     *
     *
     * quest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message =[
            'event_title.required'=>"Please enter the title of the event",
            'event_description.required'=>'Please enter a longer description (at least 30 characters)',
            'event_location.required'=>'Select a location for this event',
            'event_start.required'=>'What day does this event begin?',
            'event_end.required'=>'What day does this event end?',
            'event_organizer.required'=>'The name of the event organizer is required',
            'event_email.required'=>'Please enter a valid email address',
            'event_phone.required'=>'Please enter a valid phone number',
            'event_terms.accepted'=>'You have not accepted our terms and conditions',
            'event_poser.image'=>'file uploaded into an image: jpg,png,jpeg,x-png',
            'event_start.date'=>'invalid date format (please use yyyy-mm-dd)',
            'event_end.date'=>'invalid date format (please use yyyy-mm-dd)',



            //other messages
            'event_phone.regex'=>'Phone number submitted is invalid.',
            'event_organizer.regex'=>'Invalid name submitted.',
            'event_email.email'=>'Invalid email.',
        ];
        //validate
        Validator::make($request->all(),[
            'event_title'=>'required|regex:/^[\w., ]{3,225}$/i',
            'event_description'=>"required|regex:/^[\w?.,#-_' ]{10,225}$/i",
            'event_location'=>'required',
            'event_start'=>'required|date',
            'event_end'=>'required|date',
            'event_poster'=>'required|image|mimes:jpg,jpeg,png,x-png',
            'event_organizer'=>'required|regex:/^[\w., ]{3,80}$/i',
            'event_email'=>'required|email',
            'event_phone'=>'required|regex:/^[0-9]{11}/i',
            'event_status'=>'required'

        ],$message)->validate();

        //upload image
        $image=$request->file('event_poster');
        $imageNewName=time().'.'.$image->getClientOriginalExtension();

        $upload_folder='images/event/'.$imageNewName;

        Image::make($image)->resize(820,580,function($c){
            $c->aspectRatio();
            $c->upsize();
        })->orientate()->save($upload_folder);

        //save event
        $newEvent=Event::create([
            'title'=>$request->get('event_title'),
            'slug'=>Str::slug($request->get('event_title'),'-'),
            'image'=>$imageNewName,
            'start_date'=>strtotime($request->get('event_start')),
            'end_date'=>strtotime($request->get('event_end')),
            'description'=>$request->get('event_description'),
            'status'=>$request->get('event_status'),
            'e_organizer'=>$request->get('event_organizer'),
            'e_email'=>$request->get('event_email'),
            'e_phone'=>$request->get('event_phone'),
            'e_location'=>$request->get('event_location'),


        ]);
        if($newEvent->save()){
            //redirect back
            return redirect()->route('createEvent')->with('status','success');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            //find event with slug name
            $event= Event::whereSlug($id)->firstOrFail();
            $status=['review','open','closed','concluded'];
            return view('admin.events.show',compact('event','status'));

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
    public function updateStatus(Request $request,$title){
        // update an event status
        try{
            $Event=Event::whereSlug($title)->firstOrFail();
            //change status
            $Event->status=$request->get('status');
            if($Event->save()){
                $teams=Team::all();
                //send notification to teams
                switch ($Event->status){
                    case'open':
                        Notification::send($teams,new newEventOpen($Event));//email
                        //database notification

                        break;

                    case 'closed':
                        '';
                        break;

                    case 'concluded':
                        '';
                        break;
                }
                return redirect()->route('showEvent',$Event->slug)->with('status','updated');
            }
        }catch (ModelNotFoundException $e){
         return    view('404');
        }
    }
    public function edit($slug)
    {
        //
        try{
            $event=Event::whereSlug($slug)->firstOrFail();
            $states=$this->states;
            $status=['review','open','closed','concluded'];
            return view('admin.events.edit',compact('event','states','status'));
        }catch (ModelNotFoundException $e){

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
        //
        ///return $request->all();
        try{
            $event=Event::whereSlug($slug)->firstOrFail();

            $message =[
                'event_title.required'=>"Please enter the title of the event",
                'event_description.required'=>'Please enter a longer description (at least 30 characters)',
                'event_location.required'=>'Select a location for this event',
                'event_start.required'=>'What day does this event begin?',
                'event_end.required'=>'What day does this event end?',
                'event_organizer.required'=>'The name of the event organizer is required',
                'event_email.required'=>'Please enter a valid email address',
                'event_phone.required'=>'Please enter a valid phone number',
                'event_terms.accepted'=>'You have not accepted our terms and conditions',
                'event_poser.image'=>'file uploaded into an image: jpg,png,jpeg,x-png',
                'event_start.date'=>'invalid date format (please use yyyy-mm-dd)',
                'event_end.date'=>'invalid date format (please use yyyy-mm-dd)',
                'event_start.prevdate'=>'Previous dates can not be selected',
                'event_end.prevdate'=>'Previous dates can not be selected',
                'event_phone.phone'=>'Phone number format not allowed. use 080xxxxxxxx',




                //other messages
                'event_phone.regex'=>'Phone number submitted is invalid.',
                'event_organizer.regex'=>'Invalid name submitted.',
                'event_email.email'=>'Invalid email.',
            ];
            //validate
            Validator::make($request->all(),[
                'event_title'=>'required|regex:/^[\w., ]{3,225}$/i',
                'event_description'=>"required|regex:/^[\w?.,#-_' ]{10,225}$/i",
                'event_location'=>'required',
                'event_start'=>'required|date|prevdate',
                'event_end'=>'required|date|prevdate',
                'event_poster'=>'image|mimes:jpg,jpeg,png,x-png',
                'event_organizer'=>'required|regex:/^[\w.,\-\' ]{3,80}$/i',
                'event_email'=>'required|email',
                'event_phone'=>'required|phone|regex:/^[0-9]{11}/i',
                'event_status'=>'required'

            ],$message)->validate();
            $imageNewName='';
            if($request->file('event_poster')){
                //check if image is uploaded
                $image=$request->file('event_poster');
                $imageNewName=time().'.'.$image->getClientOriginalExtension();

                $upload_folder='images/event/'.$imageNewName;

                Image::make($image)->resize(820,580,function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->orientate()->save($upload_folder);
            }
            $oldImage='images/event/'.$event->image;
            $event->title=$request->get('event_title');
            $event->slug=Str::slug($request->get('event_title'),'-');
            //check if image is uploaded
            ($imageNewName)?$event->image=$imageNewName:$event->image=$event->image;
            $event->start_date=strtotime($request->get('event_start'));
            $event->end_date=strtotime($request->get('event_end'));
            $event->description=$request->get('event_description');
            $event->status=$request->get('event_status');
           /* $event->e_organizer=$request->get('event_organizer');
            $event->e_email=$request->get('event_email');
            $event->e_phone=$request->get('event_phone');*/
            $event->e_location=$request->get('event_location');

            //update the poster
            if($event->save()){
                //delete old image//
                ($imageNewName)?unlink($oldImage):null;
                //update the organizer
                $organizer=Organizer::find($event->organizer[0]->id);
                $organizer->organizer=$request->get('event_organizer');
                $organizer->email=$request->get('event_email');
                $organizer->phone=$request->get('event_phone');
                //
                if($organizer->save()){
                    //redirect back
                    //notify teams about status of event
                    //get all team
                    $teams=Team::all();

                    //check if status is update to either open,closed or concluded.

                    $teams=Team::all();
                   //send notification to teams
                    switch ($event->status){
                        case'open':
                            Notification::send($teams,new newEventOpen($event));
                            break;

                        case 'closed':
                            '';
                            break;

                        case 'concluded':
                            '';
                            break;
                    }
                }



                    return redirect()->route('editEvent',$event->slug)->with('status','updated');




            }

        }catch (ModelNotFoundException $e){
            return 'Page not found';
        }


        //upload image


        //save event


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
        try{
            $event=Event::whereSlug($id)->firstOrFail();
            if($event->delete()){
                $events=Event::paginate(10);
                return view('admin.events.index',compact('events'))->with('res','Event deleted');
            }
        }catch (ModelNotFoundException $e){

        }
    }
    //contact organizer
    public function contactOrganizer(Request $request){
      //validate request
        $message=[
            'subject.required'=>'enter mail subject',
            'subject.min'=>'Subject should have a minimum of 3 characters and no special characters',
            'body.required'=>'the message field is empty',
            'body.regex'=>'The message field should have a minimum of 6 characters',

        ];
        $validation=Validator::make($request->all(),[
            'subject'=>'required|min:3',
            'body'=>'required'
        ],$message);

        if($validation->fails()){
            //if errors where found
            $errors=$validation->errors();
            return response()->json(['errors'=>$errors,'res'=>'error']);
        }
        //send mail to organizer if mail is sent

        //find the organizer

        $organizer=Organizer::find($request->get('index'));
       /* Mail::send('mails.organizer.contact',[''],function ($msg) use($organizer,$request){
            $msg->to('kulblog66@gmail.com');
            $msg->subject($request->subject);
            $msg->from('efe@volleyball.ng','Volleyball.ng');

        });*/
        //mail sent
        return response()->json(['res'=>'success']);
    }
}
