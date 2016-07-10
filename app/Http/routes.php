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




Route::get('/', function () {
    return view('welcome');
    //return view('notifications.template1');
});

// Authentication routes...
Route::get('/auth/login', 'AccessController@login');
Route::post('/auth/login', 'AccessController@authenticate');
Route::get('/auth/logout', 'AccessController@logout');

// Registration routes...
Route::post('/auth/register', 'AccessController@register');
Route::get('/auth/register', 'AccessController@showRegister');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Profile Routes
Route::get('/user/profile','ProfileController@show');
Route::patch('/user/profile','ProfileController@update');

//Dashboard routes
Route::get('/home', 'HomeController@index');



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

Route::get('/notifications/sms','NotificationController@showSms');
Route::get('/notifications/email','NotificationController@showEmail');
Route::get('/notifications/email/send','NotificationController@composeEmail');
Route::patch('/notifications/email/send','NotificationController@updateEmail');
Route::post('/notifications/email/send','NotificationController@sendEmail');
