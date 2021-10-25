<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses');
    Route::get('/{course}', [CourseController::class, 'show'])->name('detail_course');
    Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('detail_lesson');
    Route::get('/lessons/{lesson}/join', [LessonController::class, 'join'])->name('join_lesson');
    Route::get('/lessons/{lesson}/leave', [LessonController::class, 'leave'])->name('leave_lesson');
    Route::get('/lessons/programs/{program}', [ProgramController::class, 'show'])->name('program');
    Route::get('/lessons/programs/{program}/learned', [ProgramController::class, 'join'])->name('learned_program');
    Route::get('/lessons/programs/{program}/leave', [ProgramController::class, 'leave'])->name('leave_program');
    Route::get('/{course}/join', [CourseController::class, 'join'])->name('join_course');
    Route::get('/{course}/leave', [CourseController::class, 'leave'])->name('leave_course');
    Route::POST('/reviews/{courseId}', [ReviewController::class, 'store'])->name('review');
});

Route::prefix('/profile')->group(function () {
    Route::get('/{user}', [ProfileController::class, 'show'])->name('profile');
    Route::get('/{user}/edit', [ProfileController::class, 'edit'])->name('edit_profile');
    Route::post('/{user}/upload', [ProfileController::class, 'upload'])->name('uploadimg_profile');
});

Auth::routes();

Route::get('/google', [GoogleController::class, 'redirectToGoogle'])->name('google');

Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
