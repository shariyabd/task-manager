<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        return "User Dashboard after checking middleware";
    }
}
