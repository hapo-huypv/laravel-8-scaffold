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

Route::get('home', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/courses/{course}')->group(function (){
    Route::get('/join', [CourseController::class, 'join'])->name('courses.join');
    Route::get('/leave', [CourseController::class, 'leave'])->name('courses.leave');
    Route::get('/lessons/{lesson}/join', [LessonController::class, 'join'])->name('courses.lessons.join');
    Route::get('/lessons/{lesson}/leave', [LessonController::class, 'leave'])->name('courses.lessons.leave');
});

Route::prefix('/lessons/{lesson}/programs/{program}')->group(function () {
    Route::get('/join', [ProgramController::class, 'join'])->name('lessons.programs.join');
    Route::get('/leave', [ProgramController::class, 'leave'])->name('lessons.programs.leave');
});

Route::resource('courses', CourseController::class)->only(['index', 'show']);

Route::resource('courses.lessons', LessonController::class)->only(['show']);

Route::resource('lessons.programs', ProgramController::class)->only(['show']);

Route::resource('courses.reviews', ReviewController::class)->only(['create']);

Route::resource('profile', UserController::class)->only(['show', 'edit', 'store']);

Auth::routes();

Route::prefix('/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});
