<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Data;
use App\Http\Controllers\Students;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;


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
Auth::routes();

Route::middleware('auth','isAdmin')->group(function () {

    Route::get('/admin',[Data::class,'Dashboard'])->name('/admin');
    Route::get('/admin/schools',[Data::class,'getSchool'])->name('/admin/schools');
    Route::get('/admin/school/{id}',[Data::class,'deleteSchool'])->name('/admin/school');
    Route::get('/admin/rooms',[Data::class,'getRooms'])->name('/admin/rooms');
    Route::post('/admin/rooms',[Data::class,'addRoom'])->name('/admin/rooms');
    Route::get('/admin/room/{id}',[Data::class,'deleteRoom'])->name('/admin/room');
    
});

Route::middleware('auth')->group(function () {

    Route::get('/',[Students::class,'viewRooms'])->name('/');

    Route::get('/home',[Students::class,'viewRooms'])->name('/home');

    Route::get('/room/{id}',[Students::class,'viewRoom'])->name('/room');

    Route::get('/view/{id}',[Students::class,'viewData'])->name('/view');

    Route::get('/logout',[LoginController::class,'logout'])->name('/logout');
});
