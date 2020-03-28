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

Route::get('/','AuthController@login')->name('ndasmu');

Route::get('/login','AuthController@login')->name('login');
Route::post('postlogin','AuthController@postlogin');
Route::get('logout','AuthCOntroller@logout');

Route::middleware(['auth','CheckRole:admin'])->group(function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/ipolt','IpoltController@index');
    Route::post('ipolt/create','IpoltController@create');
    Route::get('/ipolt/{id}/edit','IpoltController@edit');
    Route::post('/ipolt/{id}/update','IpoltController@update');
    Route::get('/ipolt/{id}/delete','IpoltController@delete');
    Route::get('/ipolt/{id}/detail', 'IpoltController@detail');

    Route::get('/pengaturan', 'UserController@index');
    Route::post('/pengaturanpost', 'UserController@create');
    Route::get('/profil/{id}/edit','UserController@edit');
    Route::post('/profil/{id}/update','UserController@update');
    Route::get('/profil/{id}/delete','UserController@delete');
    Route::get('/profil/{id}/detail', 'userController@detail');    
});

Route::middleware(['auth','CheckRole:admin,user'])->group(function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/ipolt','IpoltController@index');
    Route::get('/ipolt/{id}/detail', 'IpoltController@detail');
});


