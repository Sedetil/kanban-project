<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('tasks')
    ->name('tasks.')
    ->controller(TaskController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create'); // Form create
        Route::post('/', 'store')->name('store'); // Proses penyimpanan
        Route::get('{id}/edit', 'edit')->name('edit');
    });

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');