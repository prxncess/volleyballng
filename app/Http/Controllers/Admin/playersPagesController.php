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

            $validator=Validator::make($request->all(),[
                'player_image'=>'required|image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
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
                $team=Team::find($request->get('team_id'));
                $team->players()->attach($player->id);
                return response()->json(['status'=>'player_saved','newPlayers'=>$team->players]);
            }

        }else{
            return dd($request);
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
            return view('admin.teams.editPlayer',compact('team','player','positions'));

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
        $validator=Validator::make($request->all(),[
            'player_image'=>'image|mimes:jpeg,jpg,png,bmp,x-png|max:1024',
            'player_firstName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_lastName'=>"required|regex:/^[A-Za-z]{3,15}$/i",
            'player_height'=>'required|regex:/^[0-9]{3}$/i',
            'player_position'=>'required'
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
            $player->height=$request->get('player_height');



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
            if($player->delete()){
                //remove pivot
                $team->players()->detach($player->id);
                return redirect()->route('viewTeam',$team->name)->with('res','Player was successfully removed');
            }
        }catch (ModelNotFoundException $e){

        }
    }
}
