<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::resource('courses', CourseController::class)->only(['index', 'show', 'edit']);

Route::resource('courses.lessons', LessonController::class)->only(['show', 'edit']);

Route::resource('courses.lessons.programs', ProgramController::class)->only(['show', 'edit']);

Route::resource('courses.reviews', ReviewController::class)->only(['store']);

Route::resource('profile' , UserController::class)->only(['show', 'edit', 'store']);


Auth::routes();

Route::prefix('/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});
