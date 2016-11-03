<?php

use Codedge\Fpdf\Facades\Fpdf;

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

    Route::get('/test','DocumentController@test');
//    Route::get('/injection','DocumentController@injection');
//    Route::get('/atlanta','DocumentController@atlanta');
//    Route::get('/altoona','DocumentController@altoona');
//    Route::get('/testinject','TestController@injection');
//    Route::get('/facade','TestController@facade');
//
//    Route::get('/fpdf2', function (Codedge\Fpdf\Fpdf\FPDF $fpdf) {
//
//        $fpdf->AddPage();
//        $fpdf->SetFont('Courier', 'B', 18);
//        $fpdf->Cell(50, 25, 'Hello World!');
//        $fpdf->Output();
//
//
//    });

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');
    Route::get('/chart', 'BillsController@getAll');
    Route::get('/chart/{type}', 'BillsController@getAll');
    // Route::get('/chart/{type}', 'BillsController@getAll');
    Route::get('chartapi', function(){ return view('chart', ['type' => 'api']);});
    // return view('chart', ['bills' => $bills, 'type' => 'db'])

    Route::auth();

});
