<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Team;
use App\Player;
use Image;
class playersPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'player_image'=>'required|image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
                'player_firstName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
                'player_lastName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
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
                return response()->json(['status'=>'player_saved','newPlayers'=>$team->players,'teamName'=>$team->name]);
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
    public function show($tea,$id)
    {
        //
        try{
            $team= Team::whereName($tea)->firstOrFail();
            $player= Player::find($id);
            return view('admin.teams.seePlayer',compact('team','player'));
        }catch (ModelNotFoundException $e){

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tea,$id)
    {
        //
        try{
        $team= Team::whereName($tea)->firstOrFail();
        $player= Player::find($id);
            $positions=['right side mitter','outside mitter','middle block','sitter','opposite','middle block/libero'];
            $feets=['3 feet','4 feet','5 feet','6 feet','7 feet','8 feet',];
            $inches=['0 inches','1 inch','2 inches','3 inches','3 inches','5 inches','6 inches','7 inches','8 inches','9 inches','10 inches','11 inches',];
            return view('admin.teams.editPlayer',compact('team','player','positions','feets','inches'));

    }catch (ModelNotFoundException $e){

    }

    }


    //player


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tea, $id)
    {
        //
        $message=[
            'player_height_feet.required'=>'Select player height in feet',
            'player_height_inches.required'=>'Select player height in inches',
            'player_gender.required'=>'Select player gender',
            'player_gender.in'=>'Select player gender'
        ];
        $validator=Validator::make($request->all(),[
            'player_image'=>'image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
            'player_firstName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_lastName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_gender'=>'required|in:male,female',
            'player_height_feet'=>'required',
            'player_height_inches'=>'required',
            'player_position'=>'required',
        ])->validate();
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
            return redirect()->route('editPlayer',[$tea,$id])->with('res','updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tea,$id)
    {
        //
        try{
            $team= Team::whereName($tea)->firstOrFail();
            $player= Player::find($id);
            $player_image='images/team/players/'.$player->player_image;
            if($player->delete()){
                //remove pivot
                $team->players()->detach($player->id);
                //delete player
                unlink($player_image);
                return redirect()->route('viewTeam',$team->name)->with('res','Player was successfully removed');
            }
        }catch (ModelNotFoundException $e){

        }
    }
}
