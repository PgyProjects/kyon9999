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
    return view('backstage.starter.starter');
});

Route::post('/login', 'LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('user', 'InfoController@custom');

Route::any('getInfo', 'InfoController@getInfo');

Route::get('test','TestController@testType');

Route::get('echo ','ManagerController@monitor');

Route::get('dd','ManagerController@nav');

Route::get('dd2','ManagerController@time_delay');


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::resource('verify','VerifyController');

    Route::resource('loan','LoanController');

    Route::resource('dun','DunController');
});

Route::post('commend/{id}','CommendController@makeQR');

Route::post('num');



Route::group(['prefix' => 'test'], function(){
    Route::any('overdueList','TestController@overdueList');
    Route::any('duntest','DunController@index');
});



