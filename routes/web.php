<?php

use App\Http\Controllers\TaskController;


Route::get('/', [TaskController::class, 'index'])->name('tasks.index'); // daftar tugas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // form tambah tugas
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{task}/detail', [TaskController::class, 'updateDetail'])->name('tasks.updateDetail');




