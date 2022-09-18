<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskServices;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        Session::put('page', 'tasks');
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function store(TaskServices $task, TaskRequest $request)
    {
        $task->create($request);
        Session::flash('success_message', 'Task created with success');
        return redirect()->back();
    }
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.show',compact('task','projects'));
    }
    public function update(TaskServices $task, TaskRequest $request)
    {
        $task->update($request);
        Session::flash('success_message', 'Task updated with success');

        return redirect()->back();
    }
    public function delete($task)
    {
        $task = Task::findorfail($task);
        $task->delete();
        Session::flash('success_message', 'Task deleted with success');
        return redirect()->back();

    }
}
