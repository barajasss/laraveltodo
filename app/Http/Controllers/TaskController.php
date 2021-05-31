<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = [];
        // dd($request->query());
        if ($request->query('completed')) {
            $tasks = Task::where('completed', true)->get();
        } else {
            $tasks = Task::where('completed', false)->get();
        }
        // dd($tasks);
        return view('index', compact('tasks'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => ['required'],
            'priority' => ['required']
        ]);
        Task::create($validatedData);
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $completed = $request->input('completed');
        $task = Task::find($id);
        if ($completed === "true") {
            $task->update(['completed' => true]);
        }
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        if ($request->input('completed') === 'true') {
            Task::where('completed', true)->delete();
        } else {
            // delete all tasks
            Task::truncate();
        }
        return redirect()->back();
    }
}
