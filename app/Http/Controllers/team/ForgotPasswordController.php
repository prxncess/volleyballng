<?php

namespace App\Http\Controllers\team;
use App\Notifications\teamResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Team;
use Auth;
use Notification;
use DB;
use Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class ForgotPasswordController extends Controller
{
    //
	public function username()
    {
        return 'contact';
    }
	use SendsPasswordResetEmails;
	protected function guard()
    {
        return Auth::guard('team');
    }
    protected function broker(){
        return Password::broker('teams');
    }

    public function lostpassword(){
        return view('team.restpassword');
    }
    /*public function sendResetEmail(Request $request){
        //validate team
        $message=[
            'required'=>'Please enter team email address',
            'email'=>'Invalid email given',
        ];
        Validator::make($request->all(),[
            'email'=>'required|email',
        ],$message)->validate();
        //check if email user email is registered
        try{
            $team=Team::whereContact($request['email'])->get();
            //return $team;
           if($team->isEmpty()){
               return redirect()->route('forgotPassword')->with('status','Please enter the email you created your account with  ');
               //generate at token

           }else{
               $token= str_random('40');
               $reset= DB::table('password_resets')->insert(
                   array(
                       'token'=>$token,
                       'email'=>$request->email
                   )

               );
               if($reset){
                   //send mails to to you
                   Notification::send($team, new teamResetPassword($token));
                   //$team->notify(new teamResetPassword($token));
                   return redirect()->route('forgotPassword')->with('res','A reset link has being sent to you to enable you reset your password ');

               }
           }

        }catch (ModelNotFoundException $e){
           // return redirect()->route('forgotPassword')->with('res','Please enter the email you created your account with  ');
        }


    }
    public function resetForm(Request $request ,$token){
        return $token;
        return view('team.change');
    }*/

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('contact')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['contact' => 'required|email']);
    }

}
