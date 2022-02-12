<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
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
    return view('auth.login');
});

//Route::get('admin/rooms', [ RoomsController::class, 'index' ])->name('image.upload');
//Route::post('admin/rooms', [ RoomsController::class, 'store' ])->name('image.upload.post');

//Route::get('admin/hostel', [ \App\Http\Controllers\HostelsController::class, 'index' ])->name('hostels');
//Route::post('admin/hostel', [ \App\Http\Controllers\HostelsController::class, 'store' ])->name('hostels.post');

Route::resource('rooms', RoomsController::class);
Route::resource('roomType', \App\Http\Controllers\RoomTypeController::class);

Route::resource('hostels', \App\Http\Controllers\HostelsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



