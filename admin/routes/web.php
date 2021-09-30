<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index']);

Route::get('/visitor',[VisitorController::class,'index'])->name('visitor');

// Admin Panel Service Manage
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::post('/getServiceData',[ServiceController::class,'getServiceData'])->name('service');
Route::post('/ServiceDelete',[ServiceController::class,'ServiceDelete'])->name('service');
Route::post('/ServiceDetails',[ServiceController::class,'ServiceDetails'])->name('service');
Route::post('/ServiceUpdate',[ServiceController::class,'ServiceUpdate'])->name('service');
Route::post('/ServiceAdd',[ServiceController::class,'ServiceAdd'])->name('service');

// Admin Panel Courses Manage
Route::get('/courses',[CourseController::class,'index'])->name('courses');
Route::post('/getCoursesData',[CourseController::class,'getCoursesData'])->name('courses');
Route::post('/CoursesDelete',[CourseController::class,'CoursesDelete'])->name('courses');
Route::post('/CoursesDetails',[CourseController::class,'CoursesDetails'])->name('courses');
Route::post('/CoursesUpdate',[CourseController::class,'CoursesUpdate'])->name('courses');
Route::post('/CoursesAdd',[CourseController::class,'CoursesAdd'])->name('courses');



