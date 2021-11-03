<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function sendResetLinkEmail(Request $request)
    // {
    //     $this->validate($request, ['username' => 'required']);
    //     $user = User::where('username', $request->username)->first();

    //     if (!$user) {
    //         return back()->withErrors(
    //             ["username" => "We can't find a user with that username."]
    //         );
    //     }
    //     $token = $this->broker()->createToken($user);        

    //     Mail::send('mail.reset_password', compact('user', 'token'), function ($m) use ($user, $token) {
    //         $m->to($user->email)->subject('Reset your password');
    //     });
    //     return back()->with('status', 'We have e-mailed your password reset link!');
    // }
}
