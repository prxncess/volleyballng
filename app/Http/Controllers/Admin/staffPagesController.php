<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Staff;
use App\Team;
use Image;
class staffPagesController extends Controller
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
            //request must be ajax

            //validate request sent
            $validator=Validator::make($request->all(),[

                'staffFirstName'=>'required|regex:/^[A-Za-z ]{3,50}$/i',
                'staffLastName'=>'required|regex:/^[A-Za-z ]{3,50}$/i',
                'staffImage'=>'sometimes|mimes:png,jpg,jpeg,x-PNG,bmp|max:1024',
                'staffDescription'=>'regex:/^[A-Za-z0-9\W ]+$/i',
                'staffPosition'=>'required'
            ]);
            $errors= $validator->errors();//store errors
            //if validation fails
            if($validator->fails()){
                return response()->json(['status'=>'error','errors'=>$errors]);
            }
            //check if team already has a coach
            $check=Staff::whereTeam_id($request->get('team_index'))->where('position',$request->get('staffPosition'));
            if($check->count()>0){
                return  response()->json(['status'=>'error','exist'=>'You cant have more than one '.$request->get('staffPosition').' in a team. Please delete or update existing one']);

            }
            //upload image
            $newImageName='';
            if($request->file('staffImage')){
                $background=Image::canvas(340,280);
                $image=$request->file('staffImage');
                $newImageName=time().'.'.$image->getClientOriginalExtension();
                $fileLocation='images/team/'.$newImageName;
                //save and make the image
                Image::make($image)->resize(340,280,function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->orientate()->save($fileLocation);
            }
             //return $request->all();


            //proceed to the next field
            //save details to database
            //check if team id is available

            //save info to database
            $newStaff= Staff::create([
                'fname'=>$request->get('staffFirstName'),
                'lname'=>$request->get('staffLastName'),
                'position'=>$request->get('staffPosition'),
                'team_id'=>$request->get('team_index'),
                'description'=>$request->get('staffDescription'),
                'image'=>$newImageName

            ]);
            if($newStaff->save()){
                $team=Team::find($request->get('team_index'));
                $team->staff()->attach($newStaff->id);

                return response()->json(['status'=>'saved','newStaff'=>$team->staff,'staffTeam'=>$team->name]);
            }
            return response()->json(['status'=>'systemError','error'=>'an error occurred']);
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
            $team=Team::whereName($tea)->firstOrFail();
            $staff=Staff::whereId($id)->where('team_id',$team->id)->firstOrFail();
            return view('admin.teams.staff.show',compact('team','staff'));
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
        //find the team
        try{
            $team=Team::whereName($tea)->firstOrFail();
            $staff=$team->staff->find($id);
            $positions=['coach','manager'];
           return view('admin.teams.staff.edit',compact('team','staff','positions'));
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
    public function update(Request $request, $tea,$id)
    {
        //validate request
        $validator=Validator::make($request->all(),[

            'staff_firstName'=>'required|regex:/^[A-Za-z]{3,50}$/i',
            'staff_lastName'=>'required|regex:/^[A-Za-z]{3,50}$/i',
            'staff_image'=>'sometimes|mimes:png,jpg,jpeg,x-PNG,bmp|max:1024',
            'staff_description'=>'regex:/^[A-Za-z0-9/W]+$/i',
            'staff_position'=>'required'
        ])->validate();

        //check if team already has a coach
        try{
            //find team
            $team=Team::whereName($tea)->firstOrFail();
            $staff=$team->staff->find($id);

            //same staff position
            if($staff->position!=$request->get('staff_position')){
                //allow staff to be update
                $check=Staff::whereTeam_id($team->id)->where('position',$request->get('staff_position'))->first();
                //check if the staff to update is the current coach
                if($check->count()>0){
                    return  redirect()->route('editStaff',[$team->name,$id])->with('error','You cant have more than one '.$request->get('staff_position').' in a team. Please delete or update existing one');

                }
            }

            //upload image
            $newImageName='';
            if($request->file('staff_image')){
                $background=Image::canvas(340,280);
                $image=$request->file('staff_image');
                $newImageName=time().'.'.$image->getClientOriginalExtension();
                $fileLocation='images/team/'.$newImageName;
                //save and make the image
                Image::make($image)->resize(340,280,function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->orientate()->save($fileLocation);
            }
            //return $request->all();


            //find the given staff

            if($staff){
                $oldImage=$staff->image;

                $staff->fname=$request->get('staff_firstName');
                $staff->lname=$request->get('staff_lastName');
                $staff->position=$request->get('staff_position');
                $staff->description=$request->get('staff_description');
                !empty($newImageName)?$staff->image=$newImageName:$staff->image=$staff->image;
                //un link old image


                if($staff->save()){
                    if(!empty($newImageName)){
                        unlink($fileLocation='images/team/'.$oldImage);
                }
                    return redirect()->route('editStaff',[$team->name,$staff->id])->with('res','updated');
                }
            }


        }catch(ModelNotFoundException $e){

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
            //find team
            $team=Team::whereName($tea)->firstOrFail();
           $staff= $team->staff->find($id);
            $staff_image='images/team/'.$staff->image;
            if($staff->delete()){
                //detach from pivot
                $team->staff()->detach($staff->id);
                //delete image
                unlink($staff_image);
                return redirect()->route('viewTeam',$team->name)->with('res','staff was successfully removed');
            }


        }catch (ModelNotFoundException $e){

        }
    }
}
