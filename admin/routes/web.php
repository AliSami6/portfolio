<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->middleware('loginCheck')->middleware('loginCheck');

Route::get('/visitor',[VisitorController::class,'index'])->name('visitor')->middleware('loginCheck');

// Admin Panel Service Manage
Route::get('/service',[ServiceController::class,'index'])->name('service')->middleware('loginCheck');
Route::get('/getServiceData',[ServiceController::class,
	'getServiceData'])->name('service')->middleware('loginCheck');
Route::post('/ServiceDelete',[ServiceController::class,
	'ServiceDelete'])->name('service')->middleware('loginCheck');
Route::post('/ServiceDetails',[ServiceController::class,
	'ServiceDetails'])->name('service')->middleware('loginCheck');
Route::post('/ServiceUpdate',[ServiceController::class,
	'ServiceUpdate'])->name('service')->middleware('loginCheck');
Route::post('/ServiceAdd',[ServiceController::class,
	'ServiceAdd'])->name('service')->middleware('loginCheck');

// Admin Panel Courses Manage
Route::get('/courses',[CourseController::class,'index'])->name('courses')->middleware('loginCheck');
Route::get('/getCoursesData',[CourseController::class,
	'getCoursesData'])->name('courses')->middleware('loginCheck');
Route::post('/CoursesDelete',[CourseController::class,
	'CoursesDelete'])->name('courses')->middleware('loginCheck');
Route::post('/CoursesDetails',[CourseController::class,
	'CoursesDetails'])->name('courses')->middleware('loginCheck');
Route::post('/CoursesUpdate',[CourseController::class,
	'CoursesUpdate'])->name('courses')->middleware('loginCheck');
Route::post('/CoursesAdd',[CourseController::class,'CoursesAdd'])->name('courses')->middleware('loginCheck');

// Admin Panel Projects Manage
Route::get('/Project',[ProjectController::class,'index'])->name('Project')->middleware('loginCheck');
Route::get('/getProjectData',[ProjectController::class,
	'getProjectData'])->name('Project')->middleware('loginCheck');
Route::post('/ProjectDelete',[ProjectController::class,
	'ProjectDelete'])->name('Project')->middleware('loginCheck');
Route::post('/ProjectDetails',[ProjectController::class,
	'ProjectDetails'])->name('Project')->middleware('loginCheck');
Route::post('/ProjectUpdate',[ProjectController::class,
	'ProjectUpdate'])->name('Project')->middleware('loginCheck');
Route::post('/ProjectAdd',[ProjectController::class,'ProjectAdd'])->name('Project')->middleware('loginCheck');

// Admin Panel Contact Manage

Route::get('/Contact',[ContactController::class,'index'])->name('Contact')->middleware('loginCheck');
Route::get('/getContactData',[ContactController::class,
	'getContactData'])->name('Contact')->middleware('loginCheck');
Route::post('/ContactDelete',[ContactController::class,
	'ContactDelete'])->name('Contact')->middleware('loginCheck');

// Admin Panel Review Manage

Route::get('/Review',[ReviewController::class,'index'])->name('Review')->middleware('loginCheck');
Route::get('/getReviewData',[ReviewController::class,
	'getReviewData'])->name('Review')->middleware('loginCheck');
Route::post('/ReviewDelete',[ReviewController::class,
	'ReviewDelete'])->name('Review')->middleware('loginCheck');
Route::post('/ReviewDetails',[ReviewController::class,
	'ReviewDetails'])->name('Review')->middleware('loginCheck');
Route::post('/ReviewUpdate',[ReviewController::class,'ReviewUpdate'])->name('Review')->middleware('loginCheck');
Route::post('/ReviewAdd',[ReviewController::class,'ReviewAdd'])->name('Review')->middleware('loginCheck');

// Admin Login

Route::get('/Login',[LoginController::class,'index'])->name('Login');

Route::post('/onLogin',[LoginController::class,'onLogin'])->name('Login');

Route::get('/Logout',[LoginController::class,'onLogout'])->name('Login');

// Admin Photo Gallery

Route::get('/Photo',[PhotoController::class,'index'])->name('Photo')->middleware('loginCheck');
Route::post('/PhotoUpload',[PhotoController::class,'PhotoUpload'])->middleware('loginCheck');
Route::get('/PhotoJSON',[PhotoController::class,'PhotoJSON'])->middleware('loginCheck');
Route::get('/PhotoJSONByID/{id}',[PhotoController::class,'PhotoJSONByID'])->middleware('loginCheck');

Route::post('/PhotoDelete', [PhotoController::class,'PhotoDelete'])->middleware('loginCheck');




