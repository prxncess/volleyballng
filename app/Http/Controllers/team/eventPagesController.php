<?php

namespace App\Http\Controllers\team;

use App\Notifications\EventInterest;
use App\Notifications\RejectTeamInterest;
use App\Notifications\teamInterest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Organizer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\Notifiable;
use Notification;
use Illuminate\Support\Str;
use Validator;
use Image;
use App\Event;
use Mail;

class eventPagesController extends Controller
{
    //this controller  handle team events event registration, etc

    public function checkEvent($slug){
        //find the event
        try{
            $event=Event::whereSlug($slug)->firstOrFail();
            return view('adminTeam.events.seeEvent',compact('event'));
        }catch(ModelNotFoundException $e){
            return 'not found';
        }

    }
    public function markEvent(){
        //this function would make all events as read when a team clicks the notification icon
        //gget the logged in team
        if(auth('team')->user()){
            auth('team')->user()->unreadNotifications->markAsRead();
        }
    }

    public function shownInterest($slug){
        //a team shows interest for an event
        //firstly check if the team is approved by admin
        //if team is approved. a notification is sent to the event organizers
        //else the interest is rejected because the are yet to be approved by the admin,
        //only approved team can show interest
        //find the organizer of the eevnt

        try{
            $event=Event::whereSlug($slug)->firstOrFail();
            //check if logged in team
            $organizer=$event->organizer[0];
            $team=['id'=>auth('team')->user()->id,'name'=>auth('team')->user()->name];
            if(auth('team')->user()){

                //check if team is approved
                if(auth('team')->user()->active==0){
                    //not approved
                    //send team a notification
                    $team->notify(new RejectTeamInterest($team));
                    return redirect(route('eventOverview',[$slug]))->with('error','Sorry, but it seems your team profile is incomplete or has not been approved, which means you cannot participate in any events yet. To be approved, your team profile must contain at least 6 players, 1 staff member, and a photo of the entire team. Please email hello@volleyball.ng if you have questions');

                }elseif(auth('team')->user()->active==1) {
                    //sent interest of approval to event organizer
                    $organizer->notify(new EventInterest($event,$team));
                    //congratulate team
                    $team->notify(new teamInterest($team,$event));
                    return redirect(route('eventOverview',$event->slug))->with('res','Thank you for indicating interest in this event, the organizer will be in touch soon.');


                }
            }
        }catch (ModelNotFoundException $e){

        }

    }
}
