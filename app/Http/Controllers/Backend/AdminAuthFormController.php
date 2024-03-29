<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthFormController extends Controller
{
    public function loginForm(){
        return view('backend.auth.login');
    }

    public function registerForm(){
        return view('backend.auth.register');
    }

    public function resetForm(){
        return view('backend.auth.forget');
    }

    public function unAuthError(){
        return view('backend.error.unauth');
    }
}
