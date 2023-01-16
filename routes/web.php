<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/todos/create', [App\Http\Controllers\TodoController::class,'create'])->name('create');
Route::post('/todos/create', [App\Http\Controllers\TodoController::class,'store'])->name('store');
Route::patch('/todos/{todo}/update', [App\Http\Controllers\TodoController::class,'update'])->name('todo.update');
Route::put('/todos/{todo}/complete', [App\Http\Controllers\TodoController::class,'complete'])->name('todo.complete');
Route::delete('/todos/{todo}/incomplete', [App\Http\Controllers\TodoController::class,'incomplete'])->name('todo.incomplete');
Route::delete('/todos/{todo}/del', [App\Http\Controllers\TodoController::class,'del'])->name('todo.del');
Route::get('/todos/{todo}/edit', [App\Http\Controllers\TodoController::class,'edit'])->name('edit');
Route::get('/', function () {
    return view('welcome');
});
