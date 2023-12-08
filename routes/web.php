<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/task/create', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/task/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
Route::post('/task/reorder', [TaskController::class, 'reorder']);