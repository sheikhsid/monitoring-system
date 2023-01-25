<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students;

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

Route::middleware('auth')->group(function () {


Route::get('/home',[Students::class,'getData'])->name('/');
Route::get('/view/{id}',[Students::class,'viewData'])->name('/view');



});
