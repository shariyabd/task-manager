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
}
