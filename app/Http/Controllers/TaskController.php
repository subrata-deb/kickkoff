<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function submit(Request $request){
        $this->validate($request,[
            'taskname' => 'required'
        ]);

        $task = new Task;
        $task->taskname = $request->input('taskname');
        $task->priority = $request->input('priority');
        $task->place = $request->input('place');
        $task->responsibility = $request->input('responsibility');
        
        $task->save();

        return redirect('/tasklist')->with('task_success', 'Task List Added');
    }

    public function getTasks(){

        $tasks = Task::all();
        return view('tasklist')->with('tasks', $tasks);
    }

    
    
}
