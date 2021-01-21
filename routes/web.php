<?php

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

// Route::get('/', 'Auth@index');


// Route::get('logout', function () {
//     return view('index');
// });
Auth::routes();
Route::get('/admin', 'Dashboard@index')->name('dashboard');
Route::get('/dashboard', 'Dashboard@index')->name('dashboard');

//users
Route::get('/users', 'UserController@Index')->name('users');
Route::get('/users/create', 'UserController@Create')->name('users/create');
Route::post('/users/store', 'UserController@Store')->name('users/store');
Route::get('/users/edit/{id}', 'UserController@Edit')->name('users/edit');
Route::post('/users/update', 'UserController@Update')->name('users/update');
Route::post('/users/updatePassword', 'UserController@updatePassword')->name('users/update');
Route::get('/users/delete/{id}', 'UserController@Delete')->name('users/delete');


//Category
Route::get('/category', 'CategoryController@Index');
Route::get('/category/{id}', 'CategoryController@Index');
Route::post('/category/store', 'CategoryController@Store');
Route::post('/category/update', 'CategoryController@Update');
Route::get('/category/delete/{id}', 'CategoryController@Delete');

//Package
Route::get('/package', 'PackageController@Index');
Route::get('/package/{id}', 'PackageController@Index');
Route::post('/package/store', 'PackageController@Store');
Route::post('/package/update', 'PackageController@Update');
Route::get('/package/delete/{id}', 'PackageController@Delete');


//Banners
Route::get('/banners', 'BannerController@Index');
Route::get('/banners/create', 'BannerController@Create');
Route::post('/banners/store', 'BannerController@Store');
Route::get('/banners/edit/{id}', 'BannerController@Edit');
Route::post('/banners/update', 'BannerController@Update');
Route::get('/banners/delete/{id}', 'BannerController@Delete');
Route::get('/banners/updateStatus/{id}/{status}', 'BannerController@updateStatus');


//Settings
Route::get('/settings', 'Settings@Index');
Route::post('/settings/update', 'Settings@Update');


//Customers
Route::get('/customers', 'Customers@Index');
Route::get('/customers/create', 'Customers@Create');
Route::post('/customers/store', 'Customers@Store');
Route::get('/customers/edit/{id}', 'Customers@Edit');
Route::post('/customers/update', 'Customers@Update');
Route::get('/customers/reset-password/{id}', 'Customers@resetPassword');
Route::get('/customers/delete/{id}', 'Customers@Delete');
Route::get('/customers/updateStatus/{id}/{status}', 'Customers@updateStatus');


//Customers
Route::get('/doctors', 'Doctors@Index');
Route::get('/doctors/create', 'Doctors@Create');
Route::post('/doctors/store', 'Doctors@Store');
Route::get('/doctors/edit/{id}', 'Doctors@Edit');
Route::post('/doctors/update', 'Doctors@Update');
Route::get('/doctors/reset-password/{id}', 'Doctors@resetPassword');
Route::get('/doctors/delete/{id}', 'Doctors@Delete');
Route::get('/doctors/updateStatus/{id}/{status}', 'Doctors@updateStatus');
Route::get('/doctors/time-slot/{doctor_id}', 'Doctors@timeSlot');
Route::get('/doctors/time-slot/{doctor_id}/{id}', 'Doctors@timeSlot');
Route::post('/doctors/save-time-slot/{doctor_id}', 'Doctors@updateTimeSlot');
Route::post('/doctors/save-time-slot/{doctor_id}/{id}', 'Doctors@updateTimeSlot');
Route::get('/doctors/delete-time-slot/{doctor_id}/{id}', 'Doctors@deleteTimeSlot');



//Website

Route::get('/home', 'Web\Home@index')->name('home');
Route::get('/', 'Web\Home@index')->name('home');


