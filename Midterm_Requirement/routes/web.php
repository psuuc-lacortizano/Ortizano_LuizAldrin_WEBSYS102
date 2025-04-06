<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/student', [StudentController::class, 'index']);

Route::get('/create', [StudentController::class, 'create']);

Route::post('/add', [StudentController::class, 'add']);

Route::get('/edit/{id}', [StudentController::class, 'edit']);

Route::post('/update/{id}', [StudentController::class, 'update']);

Route::get('/delete/{id}', [StudentController::class, 'destroy']);

Route::get('/info/{id}', [StudentController::class, 'showInfo']);

Route::get('/edit-grade/{id}', [StudentController::class, 'editGrade']);

Route::put('/update-grade/{id}', [StudentController::class, 'updateGrade']);

Route::get('/courses', [StudentController::class, 'showCourses']);

Route::get('/courses/create', [StudentController::class, 'createCourse']);

Route::post('/courses/add', [StudentController::class, 'addCourse']);

Route::get('/courses/edit/{id}', [StudentController::class, 'editCourse']);

Route::post('/courses/{id}', [StudentController::class, 'updateCourse']);

Route::get('/courses/delete/{id}', [StudentController::class, 'destroyCourse']);

Route::get('/enrollment', [StudentController::class, 'showEnrollment']);

Route::get('/enrollment/delete/{id}', [StudentController::class, 'destroyEnrollment']);

Route::get('/', [StudentController::class, 'dashboard']);

Route::get('/professors', [StudentController::class, 'showProfessors']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);