<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
      
       $validated_data =  $request->validated();
       $user = new User($validated_data);
       $user->password = Hash::make($request->password);
       $user->role = 'user';
       $user->save();
      

       if($user){
        return "user register successfully";
       }else{
        return "user register faild";
       }
    }

    public function login(LoginRequest $request){


        $validated_data =  $request->validated();

        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
        
            if ($user->role === 'admin') {
                return redirect()->route('dashboard'); 
            } else {
                return "user dashboard";
                // return redirect()->route('user.dashboard'); 
            }
        } else {
            // Authentication failed
            return "failed";
        }
    
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        

        return redirect('login');
        
        
    }
}
