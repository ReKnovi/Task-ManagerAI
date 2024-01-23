<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['data' => $tasks], 200);
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            Task::create($request->validated());
            return response()->json('Task created', 201);
        } catch (\Exception $e) {
            return response()->json('Something went wrong', 500);
        }
    }

    public function show(Task $task)
    {
        return response()->json($task, 200);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return response()->json('Task has been updated', 200);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return response()->json('Task has been deleted', 200);
    }

    public function updatePriority(Task $task)
    {
       $task['priority'] = !$task['priority'];
       $task->save();
        return response()->json('Task priority has been updated', 200);
    }
}