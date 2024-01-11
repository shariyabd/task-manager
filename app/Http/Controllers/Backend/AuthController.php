<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $validated_data = $request->validated();

        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
            'role_id' => Role::where('name', 'user')->first()->id,
        ]);

        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);



        $emailSent = Mail::send('backend.mail.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        if ($emailSent) {
            return "We have successfully sent you an email for verification.";
        } else {
            return "Email sending failed.";
        }



    }


    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                return redirect(route('login.form'));
            }
        }
    }


    public function login(LoginRequest $request)
    {


        $validated_data = $request->validated();

        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->hasRole('admin')) {
                return redirect('/admin/dashboard');
            } elseif ($user->hasRole('user')) {
                return redirect('/dashboard');
            }

        }

    }

    public function logout()
    {
        Auth::logout();
        Session::flush();


        return redirect(route('login.form'));


    }
}
