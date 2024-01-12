<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function create(){
        return view('backend.createtask');
    }

    public function index(){
        return view('backend.task.task-manage');
    }

    public function store(){
        
    }
}
