<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('backend.user.user-profile');
    }

    public function setting(){
        return view('backend.user.user-setting');
    }

    public function activity(){
        return view('backend.user.user-activity');
    }

    public function notification(){
        return view('backend.user.user-notification');
    }
}
