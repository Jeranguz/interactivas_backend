<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;

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
Route::get('/events/detail/{id}', [EventsController::class, 'apiEvent']);

Route::get('/events/userevents/{user_id}/', [EventsController::class, 'userEvents']);
Route::post('/events/add', [EventsController::class, 'storeApi']);



Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('throttle:3,10'); // 3 solicitudes cada 10 minutos
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:3,10'); // 3 solicitudes cada 10 minutos

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/resolvetoken', [AuthController::class, 'userToken']);
    });
});
