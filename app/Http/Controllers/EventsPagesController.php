<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\StaffTeam;
use Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades;
use App\Event;
use Image;
use Validator;
use Illuminate\Support\Str;
class EventsPagesController extends Controller
{
    //
    public $states= array('AB' => 'Abia','AJ' => 'Abuja','AN' => 'Anambra','AD' => 'Adamawa','AK' => 'Akwa Ibom','BA' => 'Bauchi','BY' => 'Bayelsa', 'BE' => 'Benue',
        'BO' => 'Borno','CR' => 'Cross River','DE' => 'Delta','ED' => 'Edo','EK' => 'Ekiti','EB' => 'Ebonyi','EN' => 'Enugu', 'GO' => 'Gombe',
        'IM' => 'Imo','KN' => 'Kano','LA' => 'Lagos','NS' => 'Nassarawa','JI' => 'Jigawa','KB' => 'Kebbi','KD' => 'Kaduna','KG' => 'Kogi',
        'KT' => 'Katsina','KW' => 'Kwara','NR' => 'Niger','OG' => 'Ogun','ON' => 'Ondo','OS' => 'Osun','OY' => 'Oyo','PL' => 'Plateau',
        'RV' => 'Rivers','SO' => 'Sokoto','TA' => 'Taraba','YB' => 'Yobe','ZM' => 'Zamfara');

    public function new_event(){
        $states=$this->states;
        return view('events.CreateEvent',compact('states'));
    }

    public function save_event(Request $request){

        $message =[
            'event_title.required'=>"Please enter the title of the event",
            // 'event_description.required'=>'Please write at least 30 words to describe this event',
            // 'event_location.required'=>'Select the location of your event',
            // 'event_start.required'=>'When will the event start?',
            // 'event_end.required'=>'When will the event end?',
            'event_organizer.required'=>'Who is the organizer?',
            'event_email.required'=>'Email is required',
            'event_phone.required'=>'Phone number is required',
            'event_terms.accepted'=>'You have to accept our terms and conditions',
            // 'event_poser.image'=>'File uploaded into an image:jpg,png,jpeg,x-png',
            // 'event_poser.image'=>'Invalid date format (yyyy-mm-dd)',
            // 'event_poser.image'=>'invalid date format (yyyy-mm-dd)',


            //other messages
            'event_phone.regex'=>'Phone number submitted is invalid.',
            'event_organizer.regex'=>'Invalid name submitted.',
            'event_email.email'=>'Invalid email.',
        ];
        //validate
        Validator::make($request->all(),[
            'event_title'=>'required|regex:/^[\w., ]{3,225}$/i',
            // 'event_description'=>"required|regex:/^[A-Za-z0-9?.,#-_ ]{100,225}$/i",
            // 'event_location'=>'required',
            // 'event_start'=>'required|date',
            // 'event_end'=>'required|date',
            // 'event_poster'=>'required|image|mimes:jpg,jpeg,png,x-png',
            'event_organizer'=>'required|regex:/^[\w., ]{3,80}$/i',
            'event_email'=>'required|email',
            'event_phone'=>'required|regex:/^[0-9]{11}/i',
            'event_terms'=>'accepted'

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
            'end_date'=>strtotime($request->get('end_start')),
            'description'=>$request->get('event_description'),
            'status'=>'review',
            'e_organizer'=>$request->get('event_organizer'),
            'e_email'=>$request->get('event_email'),
            'e_phone'=>$request->get('event_phone'),
            'e_location'=>$request->get('event_location'),

        ]);
        if($newEvent->save()){
            //redirect back
            return redirect()->route('newEvent')->with('status','success');

        }

    }
    public function basic_email(){
        $data = array('name'=>"Virat Gandhi");

        Mail::send('mail', $data, function($message) {
            $message->to('kulblog66@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
