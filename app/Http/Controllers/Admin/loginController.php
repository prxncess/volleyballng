<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo='/login';
    protected $guard='web';
    protected $username='username';

    public function tryLogin(){
        if(Auth::guard('web')->check()){
            return redirect()->route('adminDashboard');
        }
        return view('admin.masterLogin');
    }

    public function postLogin(Request $request){
        $auth=Auth::guard('web')->attempt([
            'username'=>$request->get('user_name'),
            'password'=>$request->get('passkey')
        ]);
        if($auth){
            $request->session()->regenerate();
            return redirect()->route('adminDashboard');
        }

        return redirect()->route('MasterLogin')->with('res','Email or Password entered are incorrect');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('MasterLogin');
    }
}
