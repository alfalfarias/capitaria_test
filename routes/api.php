<?php

use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Courses\EvaluationController as CourseEvaluationController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\StudentAverageController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Students\EvaluationController as StudentEvaluationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::prefix('/courses')->middleware([])->group(function () {
    Route::get('/evaluations', [CourseEvaluationController::class, 'index'])->name('courses_evaluations.index');
    Route::post('/evaluations', [CourseEvaluationController::class, 'store'])->name('courses_evaluations.store');
    Route::put('/evaluations/{evaluation}', [CourseEvaluationController::class, 'update'])->name('courses_evaluations.update');
    Route::delete('/evaluations/{evaluation}', [CourseEvaluationController::class, 'destroy'])->name('courses_evaluations.destroy');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::prefix('/students')->middleware([])->group(function () {
    Route::get('/evaluations', [StudentEvaluationController::class, 'index'])->name('courses_evaluations.index');
    Route::post('/evaluations', [StudentEvaluationController::class, 'store'])->name('courses_evaluations.store');
    Route::put('/evaluations/{evaluation}', [StudentEvaluationController::class, 'update'])->name('courses_evaluations.update');
    Route::delete('/evaluations/{evaluation}', [StudentEvaluationController::class, 'destroy'])->name('courses_evaluations.destroy');

    
    Route::get('/averages', [StudentAverageController::class, 'index'])->name('students.averages.index');
});
