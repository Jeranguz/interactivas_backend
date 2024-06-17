<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/events/all', [EventsController::class, 'allEvents']);
Route::get('/tags/all', [TagController::class, 'allTags']);
Route::get('/categories/all', [CategoryController::class, 'index']);
Route::get('/courses/all', [CourseController::class, 'allCourses']);


Route::get('/events/detail/{id}', [EventsController::class, 'show']);

Route::post('/events/add', [EventsController::class, 'store']);