<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::get('/', function () {
    return view('welcome');
});

/*Route::auth();
// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Dashboard routes
Route::get('/home', 'HomeController@index');

*/


Route::get('/members', 'MemberController@index');
Route::get('/members/new', 'MemberController@newMember');
Route::get('/members/{id}', 'MemberController@show');
Route::get('/members/{id}/edit', 'MemberController@edit');
Route::patch('/members/{id}/update', 'MemberController@update');
Route::get('/members/confirm/{id}', 'MemberController@confirm');
Route::get('/members/destroy/{id}', 'MemberController@destroy');
Route::post('/members/save', 'MemberController@store');

Route::get('/payments','PaymentController@index');
Route::get('/payments/new', 'PaymentController@newPayment');
Route::get('/payments/{id}', 'PaymentController@show');
Route::get('/payments/{id}/edit', 'PaymentController@edit');
Route::patch('/payments/{id}/update', 'PaymentController@update');
Route::get('/payments/confirm/{id}', 'PaymentController@confirm');
Route::get('/payments/destroy/{id}', 'PaymentController@destroy');
Route::post('/payments/save', 'PaymentController@store');

Route::get('/concessions','ConcessionController@index');
Route::get('/concessions/new', 'ConcessionController@show');
Route::get('/concessions/{id}/edit', 'ConcessionController@edit');
Route::patch('/concessions/{id}/update', 'ConcessionController@update');
Route::get('/concessions/confirm/{id}', 'ConcessionController@confirm');
Route::get('/concessions/destroy/{id}', 'ConcessionController@destroy');
Route::post('/concessions/save', 'ConcessionController@store');

Route::get('/sms',function(){return view('sms');});
Route::get('/email',function(){return view('email');});
Route::get('/profile',function(){return view('profile');});
