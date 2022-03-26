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

Route::resource('rooms', RoomsController::class);
Route::resource('customers', \App\Http\Controllers\CustomerController::class);
Route::resource('roomType', \App\Http\Controllers\RoomTypeController::class);
Route::resource('booking', \App\Http\Controllers\BookingsController::class);
Route::resource('payment', \App\Http\Controllers\PaymentController::class);
Route::resource('membership', \App\Http\Controllers\MembershipController::class);
Route::resource('membershipDetails', \App\Http\Controllers\MembershipDetailsController::class);
Route::resource('hostels', \App\Http\Controllers\HostelsController::class);
Route::resource('requestHostels', \App\Http\Controllers\RequestHostelController::class);
Route::resource('hostelReview', \App\Http\Controllers\ReviewController::class);
Route::resource('featured', \App\Http\Controllers\FeaturedController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/user', [App\Http\Controllers\userRoomController::class, 'index']);

Route::get('/user/rooms/{id}', [App\Http\Controllers\userRoomController::class, 'viewRoom']);
Route::get('/user/hostels/{id}', [App\Http\Controllers\userRoomController::class, 'viewHostel']);
Route::get('/user/features/hostel', [App\Http\Controllers\userRoomController::class, 'viewFeatured']);

Route::POST('/user/review/{id}', [App\Http\Controllers\ReviewController::class, 'store']);
Route::POST('/user/hostels/search', [App\Http\Controllers\userRoomController::class, 'searchHostel']);


Route::get('/user/rooms/booking/{id}', [App\Http\Controllers\userRoomController::class, 'bookRoom']);
Route::get('/user/rooms/payment/{id}', [App\Http\Controllers\PaymentController::class, 'viewPayment']);
Route::POST('/user/rooms/checkout', [App\Http\Controllers\PaymentController::class, 'checkout']);
Route::POST('/user/membership/checkout', [App\Http\Controllers\MembershipController::class, 'checkout']);

Route::get('/user/hostels', [App\Http\Controllers\userRoomController::class, 'viewHostels']);
Route::get('/user/requestHostel', [App\Http\Controllers\RequestHostelController::class, 'index']);
Route::POST('/user/requestHostel/submit', [App\Http\Controllers\RequestHostelController::class, 'store']);


Route::POST('/admin/memberPrice/delete', [App\Http\Controllers\MembershipDetailsController::class, 'memberPriceDelete']);
Route::POST('/admin/roomType/delete', [App\Http\Controllers\RoomTypeController::class, 'roomDelete']);
Route::get('/admin/booking/{id}', [App\Http\Controllers\BookingsController::class, 'viewBookingDetails']);
Route::get('/admin/requestHostel/activate/{id}', [App\Http\Controllers\RequestHostelController::class, 'activateHostel']);

Route::get('/admin/customer/view', [App\Http\Controllers\CustomerController::class, 'viewAllCustomer']);
Route::get('/admin/customer/checkout', [App\Http\Controllers\CustomerController::class, 'checkout']);
Route::get('/admin/customer/checkout/{id}', [App\Http\Controllers\CustomerController::class, 'checkoutCustomer']);



Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from HostelSansar.com',
        'body' => 'New booking alert'
    ];

    \Mail::to('parajuli.abhinav.ap@gmail.com')->send(new \App\Mail\Mail($details));

    dd("Email is Sent.");
});







