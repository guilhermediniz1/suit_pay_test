<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

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

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Courses

Route::get('courses', [CourseController::class, 'index'])
    ->name('courses')
    ->middleware('auth');

Route::get('courses/create', [CourseController::class, 'create'])
    ->name('courses.create')
    ->middleware('auth');

Route::post('courses', [CourseController::class, 'store'])
    ->name('courses.store')
    ->middleware('auth');

Route::get('courses/{course}/edit', [CourseController::class, 'edit'])
    ->name('courses.edit')
    ->middleware('auth');

Route::put('courses/{course}', [CourseController::class, 'update'])
    ->name('courses.update')
    ->middleware('auth');

Route::delete('courses/{course}', [CourseController::class, 'destroy'])
    ->name('courses.destroy')
    ->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Students

Route::get('students', [CourseController::class, 'index'])
    ->name('students')
    ->middleware('auth');


require __DIR__.'/auth.php';
