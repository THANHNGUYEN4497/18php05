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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'UserAction'], function () {
        // url : admin/UserAction/AddUser
        Route::get('AddUser','usercontroller@adduser');
        Route::get('ListUser','usercontroller@listuser');
        Route::get('DeleteUser/{id}','usercontroller@deleteuser');
        Route::post('AddUser','usercontroller@postadduser');

       //-------------------------------
        /* Route::get('AddPro','typeproductController@addpro');
        Route::post('AddPro','typeproductController@postaddpro');
        Route::get('ListPro','typeproductController@getdata'); */

    });

});
