<?php

namespace App\Http\Controllers\team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class resetPasswordController extends Controller
{
    //
    use ResetsPasswords;
    //use RedirectsUsers;
    protected $redirectTo = 'teamAdmin/dashboard';
    public function broker()
    {
        return Password::broker('teams');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('team');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('team.change')->with(
            ['token' => $token, 'contact' => $request->contact]
        );
    }
    protected function validationErrorMessages()
    {
        return [
            'contact.required'=>'please enter your email',
            'contact.email'=>'please enter a valid email address',
            'password.required'=>'enter your new password',
            'password.confirmed'=>'You have to confirm your password',
            'password.min'=>'Password must be a minimum of six characters'
        ];
    }
    public function reset(Request $request)
    {
        //return $request->all();
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );



        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }
    protected function sendResetResponse($response)
    {
        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'contact' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
    protected function credentials(Request $request)
    {
        return $request->only(
            'contact', 'password', 'password_confirmation', 'token'
        );
    }
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('contact'))
            ->withErrors(['contact' => trans($response)]);
    }

}
