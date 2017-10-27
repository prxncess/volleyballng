<?php

namespace App\Http\Controllers\team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Team;
use AuthenticatesAndRegistersUsers, ThrottlesLogins;
class teamLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    //protected $table='teams';
    protected $redirectTo='/team/signIn';
    protected $guard='team';
   // protected $email='contact';


    public function logout(){
        Auth::guard('team')->logout();
        return redirect()->route('teamSignIn');
    }
    public function teamLogin(){
        if(Auth::guard('team')->check()){
            return redirect()->route('teamDashboard');
        }
        return view('team.teamSign');
    }
    public function teamTryLogin(Request $request){
        $message=[
            'email.required'=>'Please enter your team email',
            'email.email'=>'Email entered is invalid',
            'password.required'=>'Please enter team password',
        ];
        Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ],$message)->validate();
        //return $request->all();
        $auth=auth('team')->attempt([
            'contact'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);


        if(!$auth){
            return redirect()->route('teamSignIn')->with('message','Email and Password incorrect');
        }
        return redirect()->route('teamDashboard');
    }
}
