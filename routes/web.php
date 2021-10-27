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

Route::resource('home', HomeController::class)->only(['index']);

Route::get('/courses/{course}/action', [CourseController::class, 'userAction'])->name('courses.userAction');
Route::resource('courses', CourseController::class)->only(['index', 'show', 'edit', ]);

Route::get('/courses/{course}/lessons/{lesson}/action', [LessonController::class, 'userAction'])->name('courses.lessons.userAction');
Route::resource('courses.lessons', LessonController::class)->only(['show', 'edit']);

Route::get('/lessons/{lesson}/programs/{program}/action', [ProgramController::class, 'userAction'])->name('lessons.programs.userAction');
Route::resource('lessons.programs', ProgramController::class)->only(['show', 'edit']);

Route::resource('courses.reviews', ReviewController::class)->only(['create']);

Route::resource('profile', UserController::class)->only(['show', 'edit', 'store']);


Auth::routes();

Route::prefix('/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});
