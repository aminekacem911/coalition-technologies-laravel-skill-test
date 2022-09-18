<?php

namespace  App\Services;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskServices extends Controller
{
    public function create(Request $request)
    {
        Task::create([
            'name' => $request->name,
        ]);
    }
    public function update(Request $request)
    {
        $task = Task::findorfail($request->id);

        $task->update(
            [
                'name' => $request->name,
                'project_id'=>$request->project_id ?? null,
            ]
        );
    }


}
