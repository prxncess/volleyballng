<?php

namespace App\Http\Controllers\Organizer;

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
            'password.regex'=>'A minimum 6 characters, at least one letter and one number is required',
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
            return view('organizer.team.viewTeam',compact('team'));

        }catch (ModelNotFoundException $e){
            return "Team Not Found";
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
                return 'Your playing with fire. Your are doing something wrong';
            }
        }catch (ModelNotFoundException $e){
            return 'Player not found. Your are doing something wrong';
        }

    }
}
