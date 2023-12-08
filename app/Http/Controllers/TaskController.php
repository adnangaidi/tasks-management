<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        $projects = Project::all(); 
        return view('tasks.create', compact('projects'));
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
        ]);

        Task::create([
            'name' => $request->input('name'),
            'priority' => $request->input('priority'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
        ]);

        $task->update([
            'name' => $request->input('name'),
            'priority' => $request->input('priority'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }
    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    public function reorder(Request $request)
    {
        $taskOrder = $request->input('taskOrder');

        foreach ($taskOrder as $index => $taskId) {
            $task = Task::find($taskId);
            $task->update(['priority' => $index + 1]);
        }

        return response()->json(['message' => 'Tasks reordered successfully']);
    }
}
