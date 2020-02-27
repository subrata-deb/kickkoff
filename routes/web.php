<?php
use App\Task;
use App\Http\Auth;
use Illuminate\Http\Request;




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

Route::group(['middleware' => ['web']], function(){

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/contact-us', function () {
        return view('contact-us');
    })->Middleware('authenticated');

    Route::get('/signup', function () {
        return view('signup');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/tasklist', function () {
        return view('tasklist');
    });

    Route::get('/messages', function () {
        return view('messages');
    });


    Route::post('/edit-modal', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit-modal'
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);
    
    Route::post('/account.save', [
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);
    
    Route::get('/userimage/{filename}', [
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    Route::post('/like', [
        'uses' => 'PostController@postLikePost',
        'as' => 'like'
    ]);

    Route::get('/dashboard', 'PostController@getDashboard')->Middleware('authenticated');
    Route::get('/tasklist', 'TaskController@getTasks')->Middleware('authenticated');
    Route::get('/messages', 'MessageController@getMessages')->Middleware('authenticated');
    Route::post('contact-us/submit', 'MessageController@submit')->Middleware('authenticated');
    Route::post('tasklist/submit', 'TaskController@submit')->Middleware('authenticated');
    Route::delete('/tasklist/{taskid}', 'TaskController@deleteTask')->Middleware('authenticated');
    Route::patch('/messages/{taskid}', 'TaskController@directUpdateTask')->Middleware('authenticated');
    Route::patch('/tasklist/{taskid}', 'TaskController@editTasks')->Middleware('authenticated');
    Route::patch('/edit/{taskid}', 'TaskController@updateTask')->Middleware('authenticated');
    Route::post('signup', 'UserController@postSignUp');
    Route::post('signin', 'UserController@postSignIn');
    Route::get('logout', 'UserController@postLogout');
    Route::post('/postdashboard', 'PostController@postCreatePost')->Middleware('authenticated');
    Route::get('/post-delete/{postid}', 'PostController@deletePost')->Middleware('authenticated');
    Route::post('/postdashboard', 'PostController@postCreatePost')->Middleware('authenticated');
    
});