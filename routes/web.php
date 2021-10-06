<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('course')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses');

    Route::prefix('detail')->group(function () {
        Route::get('/{course}', [CourseController::class, 'show'])->name('detail_course');
        Route::get('/{course}/join', [CourseController::class, 'join'])->name('join_course');
        Route::get('/{course}/leave', [CourseController::class, 'leave'])->name('leave_course');
    });
});
