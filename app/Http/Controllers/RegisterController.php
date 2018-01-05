<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Staff;
use App\Team;
use App\Player;
use Image;
use Illuminate\Support\Facades\Input;
use Mail;
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
            //validate request
            //get all register teams
           // $savedTeamEmail=Team::get('contact');

            $messages=[
               /* 'logo.required'=>'Please upload your team logo',
                'team_image.required'=>'Please upload a photo of your entire team',
                'team_image.image'=>'File uploaded is not in a supported format (jpeg, jpg, png)',
                'logo.image'=>'File uploaded is not in a supported format (jpeg, jpg, png)',
                'logo.max'=>'File size should be less than 1mb',
                'team_image.max'=>'File size should be less than 2mb',*/
                //team name
                'team-name.required'=>'A team is required',
                'team-name.unique'=>'Name already registered',
                'team-name.regex'=>'Please enter a valid name',
                //team phone
                'team-phone.required'=>'Please enter your phone number',
                'team-phone.unique'=>'Phone number already registered',

                //team email
                'team-contact.required'=>'Please enter your email address',
                'team-contact.email'=>'Please enter a valid email address',
                'team-contact.unique'=>'Email address already registered',
                //terms
                'accept.accepted'=>'Please check we agree box',
                'team-description.required'=>'Please give a brief description of your team',
                'team-description.regex'=>'Please use only allowed format',
                'contact person.required'=>'who can we contact',
                'contact person.regex'=>'Please enter a valid contact person name',

            ];
            Validator::make($request->all(),[
                'team-name'=>"required|regex:/^[A-Za-z-' ]{3,100}$/i|unique:teams,name",
            'team-contact'=>'required|email|unique:teams,contact',
            'team-phone'=>'required|unique:teams,phone',

                'team-description'=>'regex:%^[A-Za-z0-9\W ]+$%i',

                /*'logo'=>'mimes:jpeg,png,jpg|max:1024',
                'team_image'=>'required|mimes:jpeg,png,jpg|max:2024',*/
                'accept'=>'accepted',
                'contact-person'=>'required|regex:/^[A-Za-z-\' ]{3,80}$/i'
            ],$messages)->validate();
            /*$errors= $validator->errors();
            if($validator->fails()){
                return response()->json(['status'=>'error','errors'=>$errors]);
            }*/
            //save logo
        $newImageName='';
      /*  if($request->file('logo')){
            $teamLogo=$request->file('logo');
            $newImageName=time().'.'.$teamLogo->getClientOriginalExtension();
            $teamFolder='images/team/'.$newImageName;
            //resize and move image
            Image::make($teamLogo)->resize(200,200,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($teamFolder);
        }*/

            //save team group
            //team image

     /*       $teamImage=$request->file('team_image');
            $newTeamName=time().'.'.$teamImage->getClientOriginalExtension();
            $teamFolder='images/team/group/'.$newTeamName;
            //resize and move image
            Image::make($teamImage)->resize(1200,550,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($teamFolder);*/
            //save detail to data base and return team_id
            //generate password
            $password=str_random(15);
           $team=Team::create([
               'name'=>$request->get('team-name'),
               'contact'=>$request->get('team-contact'),
               'contact_person'=>$request->get('contact-person'),
               'description'=>$request->get('team-description'),
               'active'=>0,
               'phone'=>$request->get('team-phone'),
               //'logo'=>($newImageName==null)?'':$newImageName,
              // 'team_image'=>$newTeamName,
               'password'=>bcrypt($password)
           ]);
            //return response()->json(['status'=>'next']);
            if($team->save()){
                //saved team id
                $this->team_id=$team->id;
                //send a mail ater registeration
                $data=array('email'=>$request->get('team-contact'),'name'=>$request->get('contact-person'),'password'=>$password);

                Mail::send('mails.account', $data, function($message) {
                    $message->to(Input::get('team-contact'));
                    $message->subject('Team Registration');
                    $message->from('volleyballsmpt@gmail.com','volleyball.ng');
                });
                //send mail to admin about new team sign up
                Mail::send('mails.newteam', ['team'=>$team,'password'=>$password], function($message) use ($team) {
                    $message->to('efe@volleyball.ng');
                    $message->subject('New Signup: volleyball.ng');
                    $message->from('volleyballdotngee@gmail.com','volleyball.ng');
                });
                return redirect()->route('teamSignIn')->with('res','Congratulations <b>'.$request->get('contact-person').'</b></br> Your team was successfully created.<p>Please check your registered email for a password to gain access to your team area. <br> If you have not received an email after a few minutes, check your spam/junk folder.</p>') ;
            }
            //return response()->json(['status'=>'error','error_message'=>'An error occurred. Please try again']);
    }
    //team coach
    public function teamCoach(Request $request){
        //check if request is ajax request
        if($request->ajax()){
            //request must be ajax

            $validator=Validator::make($request->all(),[
                'coachFirstName'=>'required|regex:/^[A-Za-z]{3,15}$/i',
                'coachLastName'=>'required|regex:/^[A-Za-z]{3,10}$/i',
                'coach_photo'=>'image|max:1024',
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
                $newStaff= Staff::create([
                    'fname'=>$request->get('coachFirstName'),
                    'lname'=>$request->get('coachLastName'),
                    'position'=>'coach',
                    'team_id'=>$request->get('team_index'),
                    'image'=>$new_image_name

                ]);
                if($newStaff->save()){
                    $team=Team::find($request->get('team_index'));
                    $team->staff()->attach($newStaff->id);
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
                'managerImage'=>'image|max:1024'
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
                $newStaff= Staff::create([
                    'fname'=>$request->get('managerFirstName'),
                    'lname'=>$request->get('managerLastName'),
                    'position'=>'Manager',
                    'team_id'=>$request->get('team_index'),
                    'image'=>$newImageName

                ]);
                if($newStaff->save()){
                    $team=Team::find($request->get('team_index'));
                    $team->staff()->attach($newStaff->id);
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
                'player_position'=>'required',
                'gender'=>'required'
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
                $team=Team::find($request->get('team_id'));
                $team->players()->attach($player->id);
                $team_players=Player::whereTeam_id($request->get('team_id'))->get();
                return response()->json(['status'=>'player_saved','newPlayers'=>$team_players]);
            }

        }
    }

    public function teamComplete(){
        return view('team.teamCompleted');
    }

}
