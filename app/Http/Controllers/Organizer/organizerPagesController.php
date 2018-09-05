<?php

namespace App\Http\Controllers\Organizer;

use App\Notifications\InterestAccepted;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Organizer;
use Validator;
use App\Team;
use App\Player;
class organizerPagesController extends Controller
{
    //
    public function signin(){
        return view('organizer.login');
    }

    public function dashboard(){
        //get all the events for the organizer
        //$events=Event::where
        try{
            $organizer=Organizer::whereId(auth('organizer')->user()->id)->firstOrFail();
            return view('organizer.dashboard',compact('organizer'));
        }catch (ModelNotFoundException $e){
            return 'not found';
        }



    }
    //change password
    public  function password(){
        return view('organizer.password');
    }
    //save new password
    public function savePassword(Request $request){
        //find the auth user
        $organizer=Organizer::find(auth('organizer')->user()->id);
        //validate password
        $messages=[
            'password.required'=>'Enter your new password',
            'password.confirmed'=>'Please enter confirmed password',
            'password.regex'=>'Password should be at least 6 characters, including 1 letter and 1 number',
        ];
        Validator::make($request->all(),[
            'password'=>'required|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d$@$!%*#?&]{6,}/'
        ],$messages)->validate();

        //save user password
        $organizer->password=bcrypt($request->get('password'));
        if($organizer->save()){
            //save and redirect back
            return redirect()->route('opassword')->with('res','password updated');

        }
    }

    public function checkTeam($team,$event){
       //find the given
        //aslo check if team is active
        //we don't allow to teams who have been deactivated registering for event
        //pull all information of teams

        try{
            $team=Team::whereName($team)->firstOrFail();
            //check if event is also correct
            try{
                $eve=Event::whereSlug($event)->firstOrFail();
                //save the teams and event to session
                session(['event'=>$eve->id]);
                session(['team'=>$team->id]);

                return view('organizer.team.viewTeam',compact('team','eve'));

            }catch(ModelNotFoundException $e){
                return view('404');
            }

        }catch (ModelNotFoundException $e){
            return view('404');
        }
    }
    public function checkPlayer($player_id,$playerName){

        //get the player first.
        //ensure that player name is also correct
        try{
            $player=Player::whereId($player_id)->firstOrFail();
            //check if found player has the same name as received name
            if(strtolower($player->lname.'-'.$player->fname==$playerName)){
                //everything is ok
                //display player view
                $team=$player->team;
               return view('organizer.team.playerCard',compact('team','player'));
            }else{

                return 'You are playing with fire. You are doing something wrong';
            }
        }catch (ModelNotFoundException $e){
            return 'Player not found. You are doing something wrong';
        }

    }
    public function acceptTeam($team,$event){
        //add team to event
        //find the team
        try{
            $tt=Team::whereName($team)->firstOrFail();
            try{
                //find event
                $ee=Event::whereSlug($event)->firstOrFail();

               //check if team information passed is actually correct
                if($tt->id==session('team')&& $ee->id==session('event')){
                    //check if team is already added to events
                    if($ee->hasTeam($tt->id)){
                        //team is already added to events
                        return redirect(route('OgCheckTeam',[$tt->name,$ee->slug]))->with('res','error');
                    }else{
                        //include team to events
                        $ee->teams()->attach([$tt->id]);
                        //send team a congratulatory message
                        $tt->notify(new InterestAccepted($tt->name,$ee->title));
                        return redirect(route('OgCheckTeam',[$tt->name,$ee->slug]))->with('res','success');
                    }
                    //$event->attach([$tt->id]);
                }
            }catch (ModelNotFoundException $e){
                return view('404');
            }

        }catch (ModelNotFoundException $e){
            return view('404');
        }

        //check if the team is already added to the team

        //


    }

    public function markEventAs(){
        //marks an notification as read for the organizer
        if(auth('organizer')){
            auth('organizer')->user()->unreadNotifications->markAsRead();
        }
    }
    public function showTeam($team){
        //looks for given team for organizer to view
        try{
            $team=Team::whereName($team)->firstOrFail();
            //check if event is also correct


                return view('organizer.team.show',compact('team'));


        }catch (ModelNotFoundException $e){
            return view('404');

                return 'Your playing with fire. Your are doing something wrong';
            }


    }
}
