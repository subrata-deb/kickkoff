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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/tasklist', function () {
    return view('tasklist');
});

Route::get('/messages', function () {
    return view('tasklist');
});


Route::get('/messages', 'MessageController@getMessages');
Route::post('contact-us/submit', 'MessageController@submit');
    
;