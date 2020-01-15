<?php
use App\Task;
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



Route::post('/tasklist', function () {
    return view('tasklist');
});

Route::get('/messages', function () {
    return view('messages');
});

Route::get('/tasklist', 'TaskController@getTasks');
Route::get('/messages', 'MessageController@getMessages');
Route::post('contact-us/submit', 'MessageController@submit');
Route::post('tasklist/submit', 'TaskController@submit');


Route::delete('/tasklist/{taskid}', function ($taskid) {
    Task::findOrFail($taskid)->delete();
    return redirect('/tasklist')->with('deleted', 'Task deleted');
});

Route::patch('/messages/{taskid}', 'TaskController@directUpdateTask');
Route::patch('/tasklist/{taskid}', 'TaskController@editTasks');
Route::patch('/edit/{taskid}', 'TaskController@updateTask');