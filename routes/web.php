<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


//main
Route::get('/', function () {
    return redirect()->to('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Front\FrontController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\Front\FrontController::class, 'contact'])->name('contact');
Route::get('/services', [App\Http\Controllers\Front\FrontController::class, 'services'])->name('services');
Route::get('/register_driver', [App\Http\Controllers\Front\FrontController::class, 'register_driver'])->name('register_driver');


//trips USER
Route::get('/Trips', [App\Http\Controllers\Trips\TripsController::class, 'trips_user'])->name('trips')->middleware('role:USER');
Route::group(['prefix' => 'Trips', 'middleware' => ['role:DRIVER', 'role:USER']], function () {

    Route::get('/track_trip', [App\Http\Controllers\Trips\TripsController::class, 'track_trips_user'])->name('track_trips_user');
    Route::get('/book_seat', [App\Http\Controllers\Trips\TripsController::class, 'book_trips_seat'])->name('book_seat');
    Route::get('/book_trips_package', [App\Http\Controllers\Trips\TripsController::class, 'book_trips_package'])->name('book_package');
});

//trips DRIVER
Route::group(['prefix' => 'Trips_driver', 'middleware' => 'role:DRIVER'], function () {
    Route::get('/', [App\Http\Controllers\Trips\TripsController::class, 'trips_driver'])->name('trips_driver');
    Route::get('/announce_trip', [App\Http\Controllers\Trips\TripsController::class, 'announce_trips'])->name('announce_trip');
    Route::get('/track_trip', [App\Http\Controllers\Trips\TripsController::class, 'track_trips_driver'])->name('track_trips_driver');
});

//profile USER
Route::group(['prefix' => 'home', 'middleware' => 'role:USER'], function () {
    Route::get('/my_profile', [App\Http\Controllers\Profile\ProfileController::class, 'profile_user'])->name('my_profile');
});

//profile DRIVER
Route::group(['prefix' => 'home', 'middleware' => 'role:DRIVER'], function () {
    Route::get('/my_profile_driver', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver'])->name('my_profile_driver');
    Route::get('/my_profile_driver/log', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver_log'])->name('my_profile_driver/log');
    Route::get('/my_profile_driver/vehicle', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver_vehicle'])->name('my_profile_driver/vehicle');
});

//profile user and driver
Route::group(['middleware' => ['role:DRIVER', 'role:USER']], function () {

    Route::get('/home/my_profile/log', [App\Http\Controllers\Profile\ProfileController::class, 'profile_user_log'])->name('my_profile/log');
    Route::get('/home/my_profile/change_password', [App\Http\Controllers\Profile\ProfileController::class, 'change_password'])->name('my_profile/change_password');
});




//insert user data
Auth::routes();
Route::post('store_user', [App\Http\Controllers\Auth\RegisterController::class, 'store_user'])->name('store_user');
Route::post('store_driver', [App\Http\Controllers\Auth\RegisterController::class, 'store_driver'])->name('store_driver');


//profile USER
Route::group(['prefix' => 'home', 'middleware' => 'role:USER'], function () {
    Route::get('/my_profile', [App\Http\Controllers\Profile\ProfileController::class, 'profile_user'])->name('my_profile');
    Route::get('/my_profile/log', [App\Http\Controllers\Profile\ProfileController::class, 'profile_user_log'])->name('my_profile/log');
});


//profile DRIVER
Route::group(['prefix' => 'home', 'middleware' => 'role:DRIVER'], function () {
    Route::get('/my_profile_driver', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver'])->name('my_profile_driver');
    Route::get('/my_profile_driver/log', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver_log'])->name('my_profile_driver/log');
    Route::get('/my_profile_driver/vehicle', [App\Http\Controllers\Profile\ProfileController::class, 'profile_driver_vehicle'])->name('my_profile_driver/vehicle');
});


//admin
Route::group(['prefix' => 'admin', 'middleware' => 'role:ADMIN'], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'admin'])->name('admin');
    Route::get('/drivers', [App\Http\Controllers\Admin\AdminController::class, 'drivers'])->name('drivers');
    Route::get('/management', [App\Http\Controllers\Admin\AdminController::class, 'management'])->name('management');
    Route::get('/packages', [App\Http\Controllers\Admin\AdminController::class, 'packages'])->name('packages');
    Route::get('/trips_log', [App\Http\Controllers\Admin\AdminController::class, 'trips'])->name('trips_log');
    Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
    Route::get('/vehicles', [App\Http\Controllers\Admin\AdminController::class, 'vehicles'])->name('vehicles');
    Route::get('/accunt', [App\Http\Controllers\Admin\AdminController::class, 'admins'])->name('accunt');
});

///CRUD user data
Auth::routes();
Route::post('/changePassword', [App\Http\Controllers\Profile\ProfileCRUD::class, 'changePasswordPost'])->name('changePasswordPost');

Route::post('store_user', [App\Http\Controllers\Auth\RegisterController::class, 'store_user'])->name('store_user');
Route::post('update_user', [App\Http\Controllers\Profile\ProfileCRUD::class, 'update_user'])->name('update_user');
Route::post('delete_user', [App\Http\Controllers\Profile\ProfileCRUD::class, 'delete_user'])->name('delete_user');

Route::post('store_driver', [App\Http\Controllers\Auth\RegisterController::class, 'store_driver'])->name('store_driver');
Route::post('update_driver', [App\Http\Controllers\Profile\ProfileCRUD::class, 'update_driver'])->name('update_driver');
Route::post('delete_driver', [App\Http\Controllers\Profile\ProfileCRUD::class, 'delete_driver'])->name('delete_driver');
Route::post('update_vehicle', [App\Http\Controllers\Profile\ProfileCRUD::class, 'update_vehicle'])->name('update_vehicle');


//insert trip
Route::post('store_trip', [App\Http\Controllers\Trips\TripCRUD::class, 'store_trip'])->name('store_trip');


Route::get('fillable', [App\Http\Controllers\Profile\ProfileController::class, 'get']);

Route::get('/test', function () {
   


    return  view('email/forgetPassword');
});


///passs

Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');








Route::get('fillable', [App\Http\Controllers\Auth\RegisterController::class, 'get']);

//AJAX User 
Route::group(['prefix'=>'users'],function(){
    Route::get('/create',[App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::post('/store',[App\Http\Controllers\Admin\UserController::class, 'store'])->name('ajax.user.store');
    Route::get('/show/{id}',[App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::post('/update',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\UserController::class, 'delete'])->name('user.delete');
});


//AJAX Vehicle
Route::group(['prefix'=>'vehicles'],function(){
    Route::get('/create',[App\Http\Controllers\Admin\VehicleController::class, 'create']);
    Route::post('/store',[App\Http\Controllers\Admin\VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/show/{id}',[App\Http\Controllers\Admin\VehicleController::class, 'show'])->name('vehicle.show');
    Route::post('/update',[App\Http\Controllers\Admin\VehicleController::class, 'update'])->name('vehicle.update');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\VehicleController::class, 'delete'])->name('vehicle.delete');
});

//AJAX Driver
Route::group(['prefix'=>'drivers'],function(){
    Route::get('/create',[App\Http\Controllers\Admin\DriverController::class, 'create']);
    Route::post('/store',[App\Http\Controllers\Admin\DriverController::class, 'store'])->name('driver.store');
    Route::get('/show/{id}',[App\Http\Controllers\Admin\DriverController::class, 'show'])->name('driver.show');
    Route::post('/update',[App\Http\Controllers\Admin\DriverController::class, 'update'])->name('driver.update');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\DriverController::class, 'delete'])->name('driver.delete');
});

//AJAX Management
Route::group(['prefix'=>'management'],function(){
    Route::get('/create_packagetype',[App\Http\Controllers\Admin\ManagementController::class, 'create_packagetype']);
    Route::post('/store_packagetype',[App\Http\Controllers\Admin\ManagementController::class, 'store_packagetype'])->name('package_type.store');
    Route::get('/show_packagetype/{id}',[App\Http\Controllers\Admin\ManagementController::class, 'show_packagetype'])->name('package_type.show');
    Route::post('/update_packagetype',[App\Http\Controllers\Admin\ManagementController::class, 'update_packagetype'])->name('package_type.update');
    Route::get('/delete_packagetype/{id}',[App\Http\Controllers\Admin\ManagementController::class, 'delete_packagetype'])->name('package_type.delete');
});



