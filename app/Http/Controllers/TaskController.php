<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Import model Task

class TaskController extends Controller
{
    public function index() {
        $pageTitle = 'Task List';
        $tasks = Task::all(); // Ambil semua task dari database

        return view('tasks.index', compact('pageTitle', 'tasks'));
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string|in:not_started,in_progress,in_review,completed',
        ]);

        // Simpan data ke database
        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit($id) {
        $pageTitle = 'Edit Task';
        $task = Task::findOrFail($id);
        
        return view('tasks.edit', compact('pageTitle', 'task'));
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string|in:not_started,in_progress,in_review,completed',
        ]);

        // Update task di database
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
}
