<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function create(){
        return view('backend.createtask');
    }

    public function index(){
        $tasks = Task::with('category')->latest()->paginate(20);
        return view('backend.task.task-manage', compact('tasks'));
    }

    public function store(Request $request){
        dd($request->all());
    }
    public function show($id){
        $taskItem = Task::with('category')->find($id);
    
        if(empty($taskItem)){
            return redirect()->back()->with('error', 'Task Not Found');
        } else {
            return response()->json(["data" => $taskItem]);
        }
    }
    
}
