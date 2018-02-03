<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Organizer;
use Validator;
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
}
