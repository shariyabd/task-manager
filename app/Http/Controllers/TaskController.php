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
        $validate_data = $request->validate([
            'title' => 'required|string',
            'assignee' => 'required|string',
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
            'priority' => 'required',
            'status' => '',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'deadline_date' => $request->deadline_date,
            'deadline_time' => $request->deadline_time,
            'priority' => $request->priority,
            'category_id' => $request->category,
            'description' => $request->description,
            'status' => "pending",
            'assignee' => $request->assignee,
            'due_time' => null
        ]);

        if($task){
            return response()->json(['success' => "Task Created Successfully"]);
        }else{
            return response()->json(['error' => 'Task Create Faild']);
        }
        
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
