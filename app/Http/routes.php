<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');
    Route::get('/chart', 'BillsController@getAll');
    Route::get('/chart/{type}', 'BillsController@getAll');
    // Route::get('/chart/{type}', 'BillsController@getAll');
    Route::get('chartapi', function(){ return view('chart', ['type' => 'api']);});
    // return view('chart', ['bills' => $bills, 'type' => 'db'])

    Route::get('/angular', function () { return view('index');});

// API ROUTES ==================================
    Route::group(array('prefix' => 'api'), function() {

        // since we will be using this just for CRUD, we won't need create and edit
        // Angular will handle both of those forms
        // this ensures that a user can't access api/create or api/edit when there's nothing there
        Route::resource('comments', 'CommentController',
            array('only' => array('index', 'store', 'destroy')));

    });
    Route::auth();

});
