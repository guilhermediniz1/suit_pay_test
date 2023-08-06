<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/courses');

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


// Enrollment

Route::post('enrollments', [EnrollmentController::class, 'store'])
    ->name('enrollments.store')
    ->middleware('auth');

Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])
    ->name('enrollments.destroy')
    ->middleware('auth');

require __DIR__.'/auth.php';
