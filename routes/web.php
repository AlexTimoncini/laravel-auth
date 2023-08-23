<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\HomeController;
use  App\Http\Controllers\ProjectController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('guest.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.index');
Route::get('/admin/trashed', [ProjectController::class, 'trashed'])->name('admin.trashed');
Route::post('/admin/restore/{project}', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('/admin/obliterate/{project}', [ProjectController::class, 'obliterate'])->name('projects.obliterate');
Route::resource('projects', ProjectController::class);