<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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



// Students

Route::get('students', [StudentController::class, 'index'])
    ->name('students')
    ->middleware('auth');

Route::get('students/create', [StudentController::class, 'create'])
    ->name('students.create')
    ->middleware('auth');

Route::post('students', [StudentController::class, 'store'])
    ->name('students.store')
    ->middleware('auth');

Route::get('students/{student}/edit', [StudentController::class, 'edit'])
    ->name('students.edit')
    ->middleware('auth');

Route::put('students/{student}', [StudentController::class, 'update'])
    ->name('students.update')
    ->middleware('auth');

Route::delete('students/{student}', [StudentController::class, 'destroy'])
    ->name('students.destroy')
    ->middleware('auth');


// Profile

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
