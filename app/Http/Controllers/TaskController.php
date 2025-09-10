<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');

    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }



    public function update(Task $task)
    {
        if ($task->is_done) {
            // Jika sudah selesai → ubah jadi belum selesai
            $task->update([
                'is_done' => false,
                'completed_at' => null
            ]);
        } else {
            // Jika belum selesai → tandai selesai + simpan waktu sekarang
            $task->update([
                'is_done' => true,
                'completed_at' => now()
            ]);
        }

        return redirect()->route('tasks.index');

    }



    public function updateDetail(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_done' => 'nullable|boolean',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_done = $request->has('is_done');

        if ($task->is_done && !$task->completed_at) {
            $task->completed_at = now();
        } elseif (!$task->is_done) {
            $task->completed_at = null;
        }

        $task->save();

        return redirect()->route('tasks.index');


    }



    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('tasks.create'); // arahkan ke view form
    }

}
