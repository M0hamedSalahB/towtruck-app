<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\driverController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\adminController;
use App\Http\Middleware\authcheck;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

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
    return view('welcome');
});


Route::post('/check',[loginController::class,'check'])->name('check');
Route::get('/logout',[logoutController::class,'logout'])->name('logout');
Route::post('/update',[dashboardController::class,'update'])->name('update');
Route::post('/register',[signupController::class,'register'])->name('register');
Route::post('driverregister',[driverController::class,'driverrigester'])->name('driverrigester');
Route::get('/admindashboard',[adminController::class,'admindashboard'])->name('admindashboard');
Route::get('/delete',[adminController::class,'delete'])->name('delete');
Route::get('/adminupdate',[adminController::class,'adminupdate'])->name('adminupdate');

Route::group(['middleware'=>['authcheck']],function(){
    Route::get('/login',[loginController::class,'login'])->name("login");
    Route::get('/signup',[signupController::class,'signup'])->name("signup");
    Route::get('/dashboard',[dashboardController::class,'profile'])->name('dashboard');
    Route::get('/edit',[dashboardController::class,'edit'])->name('edit');
    Route::get('/driversignup',[driverController::class,'driversignup'])->name('driversignup');

});
