<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        $password = new ResetPassword();

        $password->email = $request->email;
        $password->token = $token;
        $password->created_at = Carbon::now();
        $password->save();

        Mail::send('backend.mail.resetPassword', ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Password Reset Email');
        });

        return "We have sent you an email to reset your password";
       
        

    }

    public function showResetPasswordForm($token){
        return view('backend.auth.reset', ['token' => $token]);
    }
    public function passwordUpdate(Request $request){

        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

       
        $updatePassword = ResetPassword::where('email', $request->email)
            ->where('token', $request->token)
            ->first();

            if(!$updatePassword){
                return back()->withInput()->with('error', 'Invalid token!');
            }
            $user = User::where('email', $request->email)->first();
            

            if ($user) {
                // Update the  password
                $user->password = Hash::make($request->password);
                $user->save();
            }
            ResetPassword::where('email', $request->email)->delete();

            return redirect(route('login.form'))->with('message', 'Your password has been changed!');

    }
}
