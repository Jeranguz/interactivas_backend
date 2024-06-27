<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin', AdminController::class)->middleware('auth');
Route::post('/admin/account/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/account/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/account/logout', [AdminController::class, 'logout'])->name('admin.logout');



    Route::resource('events', EventsController::class)->middleware('auth');
    Route::resource('courses', CourseController::class)->middleware('auth');
    Route::resource('tags', TagController::class)->middleware('auth');
    Route::resource('users', UsersController::class)->middleware('auth');

//Route::get('/events/search/event', [EventsController::class, 'search'])->name('events.search');