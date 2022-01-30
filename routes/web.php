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
    return view('admin.dashboard');
});

Route::get('image-upload', [ RoomsController::class, 'index' ])->name('image.upload');
Route::post('image-upload', [ RoomsController::class, 'store' ])->name('image.upload.post');


Route::resource('rooms', RoomsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



