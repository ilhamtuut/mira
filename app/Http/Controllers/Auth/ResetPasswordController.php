<?php

namespace App\Http\Controllers\Auth;

use App\BackupPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // protected function rules()
    // {
    //     return [
    //         'token' => 'required',
    //         'username' => 'required',
    //         'password' => 'required|confirmed|min:6',
    //     ];
    // }

    // protected function credentials(Request $request)
    // {
    //     return $request->only(
    //         'username', 'password', 'password_confirmation', 'token'
    //     );
    // }

    // protected function resetPassword($user, $password)
    // {
    //     $user->password = Hash::make($password);

    //     $user->setRememberToken(Str::random(60));

    //     $user->save();

    //     $backup = BackupPassword::where('user_id',$user->id)->first();
    //     if($backup){
    //         $backup->password = $password;
    //         $backup->save();
    //     }

    //     event(new PasswordReset($user));

    //     // $this->guard()->login($user);
    // }

    // protected function sendResetResponse(Request $request, $response)
    // {
    //     return redirect($this->redirectPath())
    //                         ->with('status', trans($response));
    // }

    // protected function sendResetFailedResponse(Request $request, $response)
    // {
    //     return redirect()->back()
    //                 ->withInput($request->only('username'))
    //                 ->withErrors(['username' => trans($response)]);
    // }
}
