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

        $tasks = Task::orderby('created_at', 'desc')->get();
        return view('tasklist')->with('tasks', $tasks);
        
    }

    public function editTasks($taskid){

        $task = Task::find($taskid);
        return view('edit')->with('task', $task);
    }

    public function updateTask(Request $request, $taskid){

        $task = Task::find($taskid);
        $task->taskname = $request->get('taskname');
        $task->priority = $request->get('priority');
        $task->place = $request->get('place');
        $task->responsibility = $request->get('responsibility');

        $task->save();
        return redirect('/tasklist')->with('updated', 'Task Updated');

    }
    
    public function directUpdateTask(Request $request, $taskid){

        $task = Task::find($taskid);
        $task->taskname = $request->get('taskname');
        $task->priority = $request->get('priority');
        $task->place = $request->get('place');
        $task->responsibility = $request->get('responsibility');

        $task->save();
        return redirect('/tasklist')->with('updated', 'Task Updated');

    }

    public function deleteTask($taskid){

        Task::findOrFail($taskid)->delete();
        return redirect('/tasklist')->with('deleted', 'Task deleted');

    }
}
