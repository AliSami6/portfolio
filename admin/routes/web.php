<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
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
Route::get('/',[HomeController::class,'index']);

Route::get('/visitor',[VisitorController::class,'index'])->name('visitor');

// Admin Panel Service Manage
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::post('/getServiceData',[ServiceController::class,'getServiceData'])->name('service');
Route::post('/ServiceDelete',[ServiceController::class,'ServiceDelete'])->name('service');
Route::post('/ServiceDetails',[ServiceController::class,'ServiceDetails'])->name('service');
Route::post('/ServiceUpdate',[ServiceController::class,'ServiceUpdate'])->name('service');
Route::post('/ServiceAdd',[ServiceController::class,'ServiceAdd'])->name('service');


