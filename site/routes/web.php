<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index']);

Route::post('/contactSendData',[HomeController::class,'contactSendData']);

Route::get('/Course',[CourseController::class,'CoursePage']);
Route::get('/projects',[ProjectController::class,'ProjectPage']);
Route::get('/Terms',[TermsController::class,'TermsPage']);
Route::get('/Policy',[PolicyController::class,'PolicyPage']);
Route::get('/Contact',[ContactController::class,'ContactPage']);
