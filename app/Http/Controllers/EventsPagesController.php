<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\Organizer;
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
        //first create the organizer
        //then store events title

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
            'event_phone.phone'=>'Phone number format not allowed. use 080xxxxxxxx',
            'event_organizer.regex'=>'Invalid name submitted.',
            'event_email.email'=>'Invalid email.',
            'event_email.unique'=>'Email already taken. Please click <a href="organizer/Login">here</a> to login',
        ];
        //validate
        Validator::make($request->all(),[
            'event_title'=>'required|regex:/^[\w., ]{3,225}$/i',
            // 'event_description'=>"required|regex:/^[A-Za-z0-9?.,#-_ ]{100,225}$/i",
            // 'event_location'=>'required',
            // 'event_start'=>'required|date',
            // 'event_end'=>'required|date',
            // 'event_poster'=>'required|image|mimes:jpg,jpeg,png,x-png',
            'event_organizer'=>'required|regex:/^[\w.,\-\' ]{3,80}$/i',
            'event_email'=>'required|email|unique:organizers,email',
            'event_phone'=>'required|phone|unique:organizers,phone',//regex:/^[0-9]{11}
            'event_terms'=>'accepted'

        ],$message)->validate();

        //first create the organizer
        //then store events title
        //upload image
        /*$image=$request->file('event_poster');
        $imageNewName=time().'.'.$image->getClientOriginalExtension();

        $upload_folder='images/event/'.$imageNewName;

        Image::make($image)->resize(820,580,function($c){
          $c->aspectRatio();
            $c->upsize();
        })->orientate()->save($upload_folder);*/

        //generate a password and mai the user to login

        $password=str_random(10);
        $non_digts=[' ','(',')','-',',','+'];
        //save event
        $newOrganizer=Organizer::create([
            //'image'=>$imageNewName,
            //'start_date'=>strtotime($request->get('event_start')),
            //'end_date'=>strtotime($request->get('event_end')),
            //'description'=>$request->get('event_description'),
            'organizer'=>$request->get('event_organizer'),
            'email'=>$request->get('event_email'),
            'phone'=>str_replace($non_digts,'',$request->get('event_phone')),
            'password'=>bcrypt($password),
            //'e_location'=>$request->get('event_location'),
        ]);

        if($newOrganizer->save()){
            //create the event
            $newEvent=Event::create([
                'title'=>$request->get('event_title'),
                'slug'=>Str::slug($request->get('event_title'),'-'),
            ]);
            if($newEvent->save()){
                //add pivot
                $newOrganizer->events()->attach($newEvent->id);
                //redirect back
                //send mail


                /*  Mail::send('mails.newEvent',['name'=>$request->get('event_organizer'),'password'=>$password],function($message) use ($newOrganizer){
                      $message->to($newOrganizer->email);
                      $message->subject('Event Creation: volleyball.ng');
                      $message->from('volleyballdotngee@gmail.com','volleyball.ng');
                  });*/
                //test password:BJw0oDfocd

                return redirect()->route('organizerLogin')->with('status','Congratulations <b>'.$request->get('event_organizer').'</b></br>  Your event was successfully created.<p>An account was also created for you to complete and manage events you create.<br>'.$password.' Please check your registered email for a password to gain access to your account. <br> If you have not received an email after a few minutes, check your spam/junk folder.</p>') ;
                ;

            }else{
                //return an error
                //organizer account was created by event was no saved
                return redirect()->route('')->with('res','organizer account was created by event was no saved.<br> Please check your registered email for a password to gain access to your account and create the event');
            }



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
