<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students;
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

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/',[Students::class,'getIP'])->name('/');
    

Route::middleware('auth')->group(function () {
    
    Route::get('/home',[Students::class,'getData'])->name('/home');

    Route::get('/view/{id}',[Students::class,'viewData'])->name('/view');

    Route::get('/logout',[LoginController::class,'logout'])->name('/logout');

});
