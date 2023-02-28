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

    Route::get('/admin', function () { return view('admin/home'); });

    Route::get('/admin/schools',[Data::class,'getSchool'])->name('/admin/schools');
    Route::get('/admin/rooms',[Data::class,'getRooms'])->name('/admin/rooms');
    Route::post('/admin/rooms',[Data::class,'addRoom'])->name('/admin/rooms');
    
});

Route::middleware('auth')->group(function () {

    Route::get('/',[Students::class,'getData'])->name('/');

    Route::get('/home',[Students::class,'viewRooms'])->name('/home');

    Route::get('/room/{id}',[Students::class,'viewRoom'])->name('/room');

    Route::get('/view/{id}',[Students::class,'viewData'])->name('/view');

    Route::get('/logout',[LoginController::class,'logout'])->name('/logout');
});
