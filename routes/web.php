<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\ProgramUserController;
use App\Http\Controllers\ReviewController;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;

Route::get('home', [HomeController::class, 'index'])->name('home.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/courses/{course}/reviews', [ReviewController::class, 'create'])->name('courses.reviews.create');
    
    Route::resource('course-users', CourseUserController::class)->only('store', 'destroy');

    Route::resource('program-users', ProgramUserController::class)->only('store');
    
    Route::resource('courses.lessons', LessonController::class)->only(['show']);

    Route::resource('lessons.programs', ProgramController::class)->only(['show']);

    Route::resource('profile', UserController::class)->only(['show', 'update']);
});

Route::resource('courses', CourseController::class)->only(['index', 'show']);

Auth::routes();

Route::prefix('/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});
