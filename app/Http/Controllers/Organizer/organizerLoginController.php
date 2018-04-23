<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Event;
use AuthenticatesAndRegistersUsers, ThrottlesLogins;
class organizerLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo='/organizer/sigin';
    protected $guard='organizer';

    public function logout(){
        //log the event organizer out
        Auth::guard('organizer')->logout();
       return redirect()->route('organizerLogin');
    }

    public function organizerlogin(){
        //checks if the organizer is already logged in

        if(Auth::guard('organizer')->check()){
            //redirect to admin dashboard
          return  redirect()->route('organizerDashboard');
        }
        //return sign
        return view('organizer.login');
    }

    public function tryLogin(Request $request){
        $message=[
            'user_name.required'=>'Please enter your  email',
            'user_name.email'=>'Please enter a valid email address',
            'password.required'=>'Please enter your password',
        ];
        Validator::make($request->all(),[
            'user_name'=>'required|email',
            'password'=>'required'
        ],$message)->validate();

        $auth=auth('organizer')->attempt([
            'email'=>$request->get('user_name'),
            'password'=>$request->get('password')
        ],false);
        if(!$auth){
            //access denied
            return redirect()->route('organizerLogin')->with(['res'=>'Email or password is incorrect, please try again. If you have forgotten your login details, please send an email to efe@volleyball.ng']);
        }
        $request->session()->regenerate();
        //return next action dashboard
        return redirect()->route('organizerDashboard');
    }

}
