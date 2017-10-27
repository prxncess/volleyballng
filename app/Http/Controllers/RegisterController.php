<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\StaffTeam;
use App\Team;
use App\Player;
use Image;
class RegisterController extends Controller
{
    //
    public function __construct()
    {
    }

    protected $team_id;
    //post registration
    public function postRegister(Request $request){
        return $request->file('manager-photo');

    }

    public function teamInfo(Request $request){
        //check if request is ajax
        if($request->ajax()){
            //validate request
            //get all register teams
           // $savedTeamEmail=Team::get('contact');
            $validator=Validator::make($request->all(),[
                'teamName'=>"required|regex:/^[A-Za-z-' ]{3,100}$/i|unique:teams,name",
            'teamContact'=>'required|email|unique:teams,contact',
            'teamPhoneNumber'=>'required|unique:teams,phone',
            ]);
            $errors= $validator->errors();
            if($validator->fails()){
                return response()->json(['status'=>'error','errors'=>$errors]);
            }
            //save detail to data base and return team_id
           $team=Team::create([
               'name'=>$request->get('teamName'),
               'contact'=>$request->get('teamContact'),
               'active'=>0,
               'phone'=>$request->get('teamPhoneNumber')
           ]);
            //return response()->json(['status'=>'next']);
            if($team->save()){
                //saved team id
                $this->team_id=$team->id;
                return response()->json(['status'=>'next','team_id'=>$this->team_id]);
            }
            return response()->json(['status'=>'error','error_message'=>'An error occurred. Please try again']);
        }
        return false;
    }
    //team coach
    public function teamCoach(Request $request){
        //check if request is ajax request
        if($request->ajax()){
            //request must be ajax

            $validator=Validator::make($request->all(),[
                'coachFirstName'=>'required|regex:/^[A-Za-z]{3,15}$/i',
                'coachLastName'=>'required|regex:/^[A-Za-z]{3,10}$/i',
                'coach_photo'=>'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            $errors=$validator->errors();//store errors
            if($validator->fails()){
                //validator fails
                return response()->json(['status'=>'error','errors'=>$errors]);
            }
            //upload the image
            $background=Image::canvas(340,280);
            $image=$request->file('coach_photo');
            $new_image_name=time().'.'.$image->getClientOriginalExtension();
            $upload_folder='images/team/'.$new_image_name;
            Image::make($image)->resize(340,280,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($upload_folder);

            //save details to database
            //check if team id is available
            //save info to database
                $newStaff= StaffTeam::create([
                    'fname'=>$request->get('coachFirstName'),
                    'lname'=>$request->get('coachLastName'),
                    'position'=>'coach',
                    'team_id'=>$request->get('team_index'),
                    'image'=>$new_image_name

                ]);
                if($newStaff->save()){
                    return response()->json(['status'=>'next',]);
                }

                return response()->json(['status'=>'systemError','error'=>'an error occurred']);

            /*$request->session()->put('team.coach.firstname',$request->get('coachFirstName'));
            $request->session()->put('team.coach.lastname',$request->get('coachLastName'));*/
            //proceed to the next field

        }
        return false;
    }

    //team manager
    public function teamManager(Request $request){
        //check if request is ajax request
        if($request->ajax()){
            //request must be ajax

            //validate request sent
            $validator=Validator::make($request->all(),[

                'managerFirstName'=>'required|regex:/^[A-Za-z]{3,15}$/i',
                'managerLastName'=>'required|regex:/^[A-Za-z]{3,10}$/i',
                'managerImage'=>'image|mimes:png,jpg,jpeg,x-PNG,bmp|max:1024'
            ]);
            $errors= $validator->errors();//store errors
            //if validation fails
            if($validator->fails()){
                return response()->json(['status'=>'error','errors'=>$errors]);
            }
            //upload image
            $background=Image::canvas(340,280);
            $image=$request->file('managerImage');
            $newImageName=time().'.'.$image->getClientOriginalExtension();
            $fileLocation='images/team/'.$newImageName;
            //save and make the image
            Image::make($image)->resize(340,280,function($c){
               $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($fileLocation);

            //proceed to the next field
            //save details to database
            //check if team id is available

                //save info to database
                $newStaff= StaffTeam::create([
                    'fname'=>$request->get('managerFirstName'),
                    'lname'=>$request->get('managerLastName'),
                    'position'=>'Manager',
                    'team_id'=>$request->get('team_index'),
                    'image'=>$newImageName

                ]);
                if($newStaff->save()){
                    return response()->json(['status'=>'next']);
                }
            return response()->json(['status'=>'systemError','error'=>'an error occurred']);
        }
    }

    //player
    public function player(Request $request){
        if($request->ajax()){
           //validate
            $validator=Validator::make($request->all(),[
                'player_image'=>'image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
                'player_firstName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
                'player_lastName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
                'player_height'=>'required|regex:/^[0-9]{3}$/i',
                'player_position'=>'required'
            ]);
            $errors=$validator->errors();
            if($validator->fails()){
                //store errors
                return response()->json(['status'=>'error','errors'=>$errors]);
            }
            //save image
            $image=$request->file('player_image');
            $newImageName=time().'.'.$image->getClientOriginalExtension();
            $playerFolder='images/team/players/'.$newImageName;
            //resize and move image
            Image::make($image)->resize(340,280,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($playerFolder);
            //save player to database
            $player= Player::create([
                'team_id'=>$request->get('team_id'),
                'fname'=>$request->get('player_firstName'),
                'lname'=>$request->get('player_lastName'),
                'position'=>$request->get('player_position'),
                'height'=>$request->get('player_height'),
                'player_image'=>$newImageName
            ]);

            if($player->save()){
                //gets all players
                $team_players=Player::whereTeam_id($request->get('team_id'))->get();
                return response()->json(['status'=>'player_saved','newPlayers'=>$team_players]);
            }

        }
    }

    public function teamComplete(){
        return view('team.teamCompleted');
    }

}
