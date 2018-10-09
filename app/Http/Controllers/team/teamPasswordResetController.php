<?php

namespace App\Http\Controllers\team;
use Notifications;
use App\Notifications\teamResetPassword;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Password;
use App\Team;
use Validator;
use DB;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class teamPasswordResetController extends Controller
{
   // use ResetsPasswords;
    use SendsPasswordResetEmails;
    //this controller handles resetting and sending new passwords to teams
    protected function guard()
    {
        return Auth::guard('team');
    }
    protected function broker(){
        return Password::broker('teams');
    }

    //resting team password

    public function lostpassword(){
        return view('team.restpassword');
    }
    public function sendPassword(Request $request){
        //validate team
        $message=[
            'required'=>'Please enter team email address',
            'email'=>'Invalid email given',
            ''
        ];
        Validator::make($request->all(),[
            'email'=>'required|email',
        ],$message)->validate();
        //check if email user email is registered
        try{
            $team=Team::whereContact($request->email)->firstOrFail();
            //generate at token
            $token= str_random('40');
            $reset= DB::table('team_reset_password')->insert(
                array(
                    'token'=>$token,
                    'email'=>$request->email
                )

            );
            if($reset){
                //send mails to to you

            }
        }catch (ModelNotFoundException $e){
            return redirect()->route('forgotPassword')->with('res','Rest code was sent your email ');
        }


    }

    protected function sendResetLink(array $credentials)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.

        $user =Team::whereContact($credentials)->get();

        if (is_null($user)) {
            return static::INVALID_USER;
        }
        $token=str_random('40');

        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.
        $user->notify( new teamResetPassword($token));

        return static::RESET_LINK_SENT;
    }
    public function ResetLink(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response =$this->sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }


    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }


}
