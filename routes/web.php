<?php

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

Route::get('/', 'UploadController@index');
Route::delete('/images/{imageUpload}', 'UploadController@destroy');

Route::view('about', 'about')->middleware('test');

Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::resource('customers', 'CustomersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile/{profile}', 'ProfilesController@show');

Route::get('post/{post}-{slug}', 'PostController@show');
