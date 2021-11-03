<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Role;
use App\User;
use App\Balance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username|alpha_num|max:17',
            'phone_number' => 'required|string|unique:users,phone_number',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        Balance::create([
            'user_id' => $user->id,
            'balance' => 0,
            'status' => 1,
            'description' => 'My Wallet'
        ]);

        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        // $user->verify();
        $user->sendVerification();
        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
        // $request->session()->flash('success', 'Successfully register account, please login to account.');
        $request->session()->flash('success', 'Successfully register account, Please click on the activation link that we sent to your email.');
        return redirect('/login');
    }

    public function verify(Request $request, $token)
    {
        $email = $request->get('email');
        $user = User::where('verification_token', $token)->where('email', $email)->first();
        if ($user) {
            $user->verify();
            $request->session()->flash('success', 'Your account is activated, please login');
        }
        return redirect('/login');
    }

    public function sendVerification(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if ($user && !$user->is_verified) {
            $user->sendVerification();
            $request->session()->flash('success', 'Please click on the activation link that we sent to your email.');
        }
        return redirect()->back();
    }
}
