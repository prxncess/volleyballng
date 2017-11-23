<?php

namespace App\Http\Controllers\team;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use Auth;
use Illuminate\Validation\Rule;
use Validator;
use App\Player;
use Image;
use Mail;


class teamPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the team information
        $team=auth('team')->user();
        return view('adminTeam.players.index',compact('team'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store players
    public function store(Request $request)
    {
        //
        if($request->ajax()){
            //validate
            $message=[
                'player_height_feet.required'=>'Select player height in feet',
                'player_height_inches.required'=>'Select player height in inches',
                'player_gender.required'=>'Select player gender',
                'player_gender.in'=>'Select player gender'
            ];
            $validator=Validator::make($request->all(),[
                'player_image'=>'required|image|max:1024',
                'player_firstName'=>"required|regex:/^[A-Za-z ]{3,15}$/i",
                'player_lastName'=>"required|regex:/^[A-Za-z ]{3,15}$/i",
                'player_height_feet'=>'required',
                'player_height_inches'=>'required',
                'player_position'=>'required',
                'player_gender'=>'required|in:male,female',
            ],$message);
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
                'feet'=>$request->get('player_height_feet'),
                'inches'=>$request->get('player_height_inches'),
                'player_image'=>$newImageName,
                'gender'=>$request->get('player_gender')

            ]);

            if($player->save()){
                //gets all players
                $team=Team::find($request->get('team_id'));
                $team->players()->attach($player->id);
                return response()->json(['status'=>'player_saved','newPlayers'=>$team->players]);
            }

        }else{
            //return dd($request);
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
            $team= auth('team')->user();
            $player= Player::find($id);
            return view('adminTeam.players.show',compact('team','player'));
        }catch (ModelNotFoundException $e){

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //player edit
    public function edit($id)
    {
        //
        try{
            $team= auth('team')->user();
            $player= Player::find($id);
            $positions=['Right side hitter','Outside hitter','Middle blocker','Setter','Opposite','Libero'];
            $feets=['3 feet','4 feet','5 feet','6 feet','7 feet','8 feet',];
            $inches=['0 inches','1 inch','2 inches','3 inches','3 inches','5 inches','6 inches','7 inches','8 inches','9 inches','10 inches','11 inches',];
            return view('adminTeam.players.edit',compact('team','player','positions','inches','feets'));

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
    public function update(Request $request, $id)
    {
        //
        $message=[
            'player_height_feet.required'=>'Select player height in feet',
            'player_height_inches.required'=>'Select player height in inches',
            'player_gender.required'=>'Select player gender',
            'player_gender.in'=>'Select player gender'
        ];
        Validator::make($request->all(),[
            'player_image'=>'image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
            'player_firstName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_lastName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_height_feet'=>'required',
            'player_height_inches'=>'required',
            'player_position'=>'required',
            'player_gender'=>'required|in:male,female',
        ],$message)->validate();
        //save image
        $player=Player::find($id);
        if($request->file('player_image')){
            $image=$request->file('player_image');
            $newImageName=time().'.'.$image->getClientOriginalExtension();
            $playerFolder='images/team/players/'.$newImageName;
            //resize and move image
            Image::make($image)->resize(340,280,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($playerFolder);

            //store new image
            $oldimage=$player->player_image;
            $player->player_image=$newImageName;
            unlink('images/team/players/'.$oldimage);
        }



        //save player to database


        //old image

        $player->fname=$request->get('player_firstName');
        $player->lname=$request->get('player_lastName');
        $player->position=$request->get('player_position');
        $player->feet=$request->get('player_height_feet');
        $player->inches=$request->get('player_height_inches');
        $player->gender=$request->get('player_gender');



        if($player->save()){
            //gets all players
            //remove old image
            return redirect()->route('updatePlayer',[$id])->with('res','updated');
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
        try{
            $team= auth('team')->user();
            $player= Player::find($id);
            $playerImage=asset('images/team/players/'.$player->player_image);
            if($player->delete()){
                //remove pivot
                //delete image

                //unlink($playerImage);
                $team->players()->detach($player->id);
                return redirect()->route('overview')->with('res','Player was successfully removed');
            }
        }catch (ModelNotFoundException $e){

        }
    }
    public function overview(){
        $logged_team=auth('team')->user();
        try{
            $team=Team::whereName($logged_team->name)->firstOrFail();
            return view('adminTeam.overview',compact('team'));

        }catch (ModelNotFoundException $e){
            return view('404');
        }
    }
    //validating information collected
    public function teamEdit(Request $request){
        //check if the request is ajax
        $logged_team=auth('team')->user();
        //return $logged_team;
            //validate request
            $team=Team::whereId($logged_team->id)->firstOrFail();;//fetches team data from database
            $messages=[

                'team_img.image'=>'Please upload a file in a supported format (jpeg,png,jpg)',
                'logo.image'=>'Please upload a file in a supported format (jpeg,png,jpg)',
                'logo.max'=>'File uploaded exceeds 1mb',
                'teamContact.email'=>'Invalid email submitted. Format: youname@ggg.com',
                'teamContact.unique'=>'Email submitted is already in use',
                'teamPhone.unique'=>'Phone number already in use by another team',
                'teamPhone.digits'=>'Phone number must be 11 digits',
            ];//custom messages for errors

        //dd($team->name);
          Validator::make($request->all(),[
               'logo'=>'image|max:1024',
               'team_image'=>'image',
              'contactPerson'=>'required|regex:/^[A-Za-z-\' ]{3,80}$/i',
                'teamContact'=>["email",'required',
                    Rule::unique('teams','contact')->ignore($team->id),
                ],
                'teamPhone'=>["digits:11",'required',
                    Rule::unique('teams','phone')->ignore($team->id),
                ],
                'teamDescription'=>"regex:%^[A-Za-z0-9\W ]{10,255}$%i",
                //'password'=>'confirmed|min:6|max:20',

            ],$messages)->validate();

        //check if logo was upload
        if($request->file('logo')){
            //logo was uploaded
            $teamLogo=$request->file('logo');
            $newImageName=time().'.'.$teamLogo->getClientOriginalExtension();
            $teamFolder='images/team/'.$newImageName;
            //resize and move image
            Image::make($teamLogo)->resize(200,200,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($teamFolder);
            //fetch old logo so as to unlink it
            $oldLogo=$team->logo;
            $team->logo=$newImageName;//save logo name to database
            if($oldLogo!=''?unlink('images/team/'.$oldLogo):null);//deletes old image from database

        }
        //check if team images was uploaded
        if($request->file('team_image')){
            //image was uploaded
            $teamImage=$request->file('team_image');
            $newTeamImage=time().'.'.$teamImage->getClientOriginalExtension();
            $teamFolder='images/team/group/'.$newTeamImage;
            //resize and move image
            Image::make($teamImage)->resize(1200,550,function($c){
                $c->aspectRatio();
                $c->upsize();
            })->orientate()->save($teamFolder);
            $oldTeamImage=$team->team_image;
            $team->team_image=$newTeamImage;//save image name to database
            if($oldTeamImage!=''?unlink('images/team/group/'.$oldTeamImage):null);//delete old image from database
        }
        //save received information

        $team->contact=$request->get('teamContact');
        $team->phone=$request->get('teamPhone');
        $team->description=$request->get('teamDescription')?$request->get('teamDescription'):'';
        $team->contact_person=$request->get('contactPerson');

        if($team->save()){
            //redirect  to team over view with response
            return redirect()->route('overview',[$team])->with('res','Team information was successfully updated');
        }




    }
    public function teamUpdate(){
        $logged_team=auth('team')->user();
        try{
            //find team
            $team=Team::whereName($logged_team->name)->firstOrFail();
            return view('adminTeam.editTeam',compact('team'));

        }catch (ModelNotFoundException $e){

        }
    }

    //request for team review
    public function teamReview(Request $request){
        //check if the request sent over by ajax
        if($request->ajax()){

            //validate $request
           $validator= Validator::make($request->all(),[
                'email'=>'required|email'
            ]);
            if($validator->fails()){
                $errors=$validator->errors();
                return response()->json(['errors'=>$errors,'status'=>'error']);
            }

            //send mail to admin
            $data=['name'=>$request->get('name'),'email'=>$request->get('email')];
           $mail= Mail::send('mails.review',$data,function($message){
                $message->to('eorijesu@gmail.com','Efeoghene Ori-Jesu');
                $message->from('volleyballsmpt@gmail.com','volleyball.ng');
                $message->subject('Team Review');
            });

            return response()->json(['status'=>'success','response'=>"Cheers!!! Your request was sent successfully and awaiting review.
<p><b>Please don't send another request</b></p>"]);
        }
    }
}
