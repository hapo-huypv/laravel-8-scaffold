<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses');
    Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/{course}/join', [CourseController::class, 'join'])->name('courses.join');
    Route::get('/{course}/leave', [CourseController::class, 'leave'])->name('courses.leave');

    Route::prefix('/{course}/lessons')->group(function () {
        Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
        Route::get('/{lesson}/join', [LessonController::class, 'join'])->name('lessons.join');
        Route::get('/{lesson}/leave', [LessonController::class, 'leave'])->name('lessons.leave');

        Route::prefix('/{lesson}/programs')->group(function () {
            Route::get('/{program}', [ProgramController::class, 'show'])->name('programs');
            Route::get('/{program}/learned', [ProgramController::class, 'join'])->name('programs.join');
            Route::get('/{program}/leave', [ProgramController::class, 'leave'])->name('programs.leave');
        });
    });
    
    Route::POST('/reviews/{courseId}', [ReviewController::class, 'store'])->name('reviews');
});

Route::prefix('/profile')->group(function () {
    Route::get('/{user}', [UserController::class, 'show'])->name('profile');
    Route::post('/{user}/update', [UserController::class, 'update'])->name('profile.update');
});

Auth::routes();

Route::prefix('/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});
