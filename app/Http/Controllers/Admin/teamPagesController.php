<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
//use App\Staff;
//use App\Player;
use Illuminate\Validation\Rule;
use Validator;
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
        //
        $teams=Team::paginate(6);

        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator=Validator::make($request->all(),[
            'teamName'=>"required|regex:/^[A-Za-z-' ]{3,100}$/i|unique:teams,name",
            'teamContact'=>'required|email|unique:teams,contact',
            'teamPhoneNumber'=>'required|unique:teams,phone',
            'teamDescription'=>'regex:%^[A-Za-z0-9\W ]+$%i',
            'contactPerson'=>'required|regex:/^[A-Za-z-\' ]{3,80}$/i',
        ])->validate();
        /*$errors= $validator->errors();
        if($validator->fails()){
            return response()->json(['status'=>'error','errors'=>$errors]);
        }*/
        //generate random password
        $password=str_random(15);
        //save detail to data base and return team_id
        $team=Team::create([
            'name'=>$request->get('teamName'),
            'contact'=>$request->get('teamContact'),
            'active'=>0,
            'phone'=>$request->get('teamPhoneNumber'),
            'contact_person'=>$request->get('contactPerson'),
            'description'=>$request->get('teamDescription'),
            'password'=>bcrypt($password)
        ]);
        //return response()->json(['status'=>'next']);
        if($team->save()){
            //saved team id
            $teams=Team::all();

            //send mail to contact person and admin
            $data=array('email'=>$request->get('teamContact'),'name'=>$request->get('teamPerson'),'password'=>$password);

          /*  Mail::send('mails.account', $data, function($message) {
                $message->to(Input::get('teamContact'));
                $message->subject('Team Registration');
                $message->from('volleyballdotngee@gmail.com','volleyball.ng');
            });
            //send mail to admin about new team sign up
            Mail::send('mails.newteam', ['team'=>$team,'password'=>$password], function($message) use ($team) {
                $message->to('efe@volleyball.ng');
                $message->subject('New Signup: volleyball.ng');
                $message->from('volleyballdotngee@gmail.com','volleyball.ng');
            });*/
            return redirect()->route('viewTeam',$team->name)->with('res','Team '.$request->get('name').' was successfully created');

        }
        //return response()->json(['status'=>'error','error_message'=>'An error occurred. Please try again']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //find the given team


        try{
            $team=Team::whereName($name)->firstOrFail();
            $malePlayers=$team->players()->whereGender('male')->get();
            $femalePlayers=$team->players()->whereGender('female')->get();
            return view('admin.overview',compact('team','malePlayers','femalePlayers'));

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
    public function edit($name)
    {
        //find team using the name provided
        try{
            $team=Team::whereName($name)->firstOrFail();
            return view('admin.teams.edit',compact('team'));

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
    public function update(Request $request, $name)
    {
        //return $request->all();
        //find team to update
        try{
            $team=Team::whereName($name)->firstOrFail();
            //validate request
            $messages=[

                'team_img.image'=>'Please upload a file in a supported format (jpeg,png,jpg)',
                'logo.image'=>'Please upload a file in a supported format (jpeg,png,jpg)',
                'logo.max'=>'File uploaded exceeds 1mb',
                'teamContact.email'=>'Invalid email submitted. Format: youname@ggg.com',
                'teamContact.unique'=>'Email submitted is already in use',
                'teamPhone.unique'=>'Phone number already in use by another team',
                'teamPhone.digits'=>'Phone number must be 11 digits',
                'contactPerson.required'=>"Contact person field is required",
            ];//custom messages for errors

            Validator::make($request->all(),[
                'teamName'=>["required","regex:/^[A-Za-z-' ]{3,100}$/i",
                Rule::unique('teams','name')->ignore($team->id),
                ],
                'contactPerson'=>'required|regex:/^[A-Za-z-\' ]{3,80}$/i',
                'teamContact'=>["required","email",
                    Rule::unique('teams','contact')->ignore($team->id),
                ],
                'teamPhone'=>["required","digits:11",
                    Rule::unique('teams','phone')->ignore($team->id),
                ],
                'teamDescription'=>"regex:%^[A-Za-z0-9\W ]+$%i",
                'password'=>'confirmed|min:6|max:20',
                'teamLogo'=>'image|max:1024',

            ])->validate();
            //check if logo was upload
            if($request->file('teamLogo')){
                //logo was uploaded
                $teamLogo=$request->file('teamLogo');
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
            //save the team
            $newpassword=bcrypt($request->get('password'));//new password
            $oldpassword=$team->password;//old password

            $team->name=$request->get('teamName');
            $team->contact=$request->get('teamContact');
            $team->phone=$request->get('teamPhone');
            $team->description=$request->get('teamDescription')?$request->get('teamDescription'):'';
            $team->password=$request->get('password')?$newpassword:$oldpassword;
            $team->contact_person=$request->get('contactPerson');
            if($team->save()){

                //send mail to team
                $data=array(
                    'email'=>$request->get('teamContact'),
                    'name'=>$request->get('contactPerson'),
                    'team'=>$request->get('teamName'),
                    'password'=>$request->get('password'),
                    'description'=>$request->get('teamDescription'),
                    'phone'=>$request->get('teamPhone'));

                Mail::send('mails.restPassword', $data, function($message) {
                    $message->to(Input::get('teamContact'));
                    $message->subject('Updated Team Information');
                    $message->from('admin@volleyball.ng','volleyball.ng');
                });
                return redirect()->route('editTeam',$team->name)->with('res','Team information updated. An email was also sent to the team with changes made');

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
    public function destroy($name)
    {
        //
        try{
            $team=Team::whereName($name)->firstOrFail();
            if($team->delete()){
                //remove players and staff
                $team->staff()->delete();
                $team->players()->delete();
                //remove pivot from table
                $playerPivot= $team->players->pluck('id')->toArray();
                $staffPivot=$team->staff->pluck('id')->toArray();

                !empty($playerPivot)?$team->players()->detach([$playerPivot]):'';
                !empty($staffPivot)?$team->staff()->detach($staffPivot):'';

                $teams=Team::all();

                return redirect()->route('allTeams')->with('res','Team '.$name.' has been deleted');
            }

        }catch (ModelNotFoundException $e){

        }
    }
    //update team status
    public function teamStatus(Request $request){
        //check if request is ajax
        if($request->ajax()){
            //find the team
            //return $request->all();
            try{
                $team=Team::whereId($request->get('index'))->firstOrFail();
                //return($team);
                if($request->get('status')=='inactive'){

                    $team->active=0;
                }else{

                    $team->active=1;
                }
                if($team->save()){
                    //send mail to team
                    $data=[
                        'team'=>$team->name,
                        'email'=>$team->email,
                        'active'=>$team->active
                    ];
                    Mail::send('mails.teamStatus', ['team'=>$team],function($message) use($team) {
                        $message->to($team->contact,$team->name);
                        $message->subject('Team Status');
                        $message->from('admin@volleyball.ng','volleyball.ng');
                    });
                    return response()->json(['status'=>'success','response'=>'Updated','teamStatus'=>$team->active]);
                }
            }catch (ModelNotFoundException $e){

            }


        }
    }
}
