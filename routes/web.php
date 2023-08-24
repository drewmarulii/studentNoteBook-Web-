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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notebook', [App\Http\Controllers\NotebookController::class, 'index'])->name('pages.notebook');
Route::post('/notebook', [App\Http\Controllers\NotebookController::class, 'store'])->name('notebook');
Route::post('/home', [App\Http\Controllers\NotebookController::class, 'store'])->name('notebook');
Route::get('/notebook/create-notebook', [App\Http\Controllers\NotebookController::class, 'create'])->name('create');
Route::get('/notebook/{notebooks}', [App\Http\Controllers\NotebookController::class, 'show'])->name('pages.notes');
Route::get('/notebook/{notebooks}/edit', [App\Http\Controllers\NotebookController::class, 'edit'])->name('pages.edit');
Route::put('/notebook/{notebooks}', [App\Http\Controllers\NotebookController::class, 'update'])->name('update');
Route::delete('/notebook/{notebooks}', [App\Http\Controllers\NotebookController::class, 'delete'])->name('delete');
Route::get('/notebook/{notebooks}/show', [App\Http\Controllers\NotebookController::class, 'show'])->name('show');

Route::get('/todolist', [App\Http\Controllers\TodolistController::class, 'index'])->name('page.todolist');
Route::post('/todolist', [App\Http\Controllers\TodolistController::class, 'store'])->name('todolist');
Route::post('/home', [App\Http\Controllers\TodolistController::class, 'store']);
Route::get('/todolist/create-task', [App\Http\Controllers\TodolistController::class, 'create'])->name('create');
Route::delete('/todolist/{todolist}', [App\Http\Controllers\TodolistController::class, 'delete'])->name('delete');





