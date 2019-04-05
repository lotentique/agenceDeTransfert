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
//les route pour la connexion
Route::group(['namespace'=>'Auth'], function () {
    Route::get('login', 'MonLoginController@index')->name('login');
    Route::post('login', 'MonLoginController@store');
    Route::get('logout', 'MonLoginController@destroy')->name('logout');
});


//les routes pour crud agent

    Route::match(['get', 'head'], 'agents', 'AgentController@index')->name('agents.index')->middleware('admin');
    Route::post('agents', 'AgentController@store')->name('agents.store')->middleware('admin');
    Route::match(['get', 'head'], 'agents/create', 'AgentController@create')->name('agents.create');
    Route::delete('agents/{user}', 'AgentController@destroy')->name('agents.destroy');
    Route::match(['put', 'path'], 'agents/{user}', 'AgentController@update')->name('agents.update')->middleware('admin');
    Route::get('agents/{user}/edit', 'AgentController@edit')->name('agents.edit')->middleware('admin');
    Route::get('agents/{user}/destroy', 'AgentController@destroyForm')->name('agents.delete')->middleware('admin');


//les routes pour crud bcm

Route::match(['get', 'head'], 'bcm', 'BcmController@index')->name('bcm.index')->middleware('admin');
Route::post('bcm', 'BcmController@store')->name('bcm.store')->middleware('admin');
Route::match(['get', 'head'], 'bcm/create', 'BcmController@create')->name('bcm.create');
Route::delete('bcm/{user}', 'BcmController@destroy')->name('bcm.destroy');
Route::match(['put', 'path'], 'bcm/{user}', 'BcmController@update')->name('bcm.update')->middleware('admin');
Route::get('bcm/{user}/edit', 'BcmController@edit')->name('bcm.edit')->middleware('admin');
Route::get('bcm/{user}/destroy', 'BcmController@destroyForm')->name('bcm.delete')->middleware('admin');

//les routes pour crud admin

Route::match(['get', 'head'], 'admin', 'AdminController@index')->name('admin.index')->middleware('admin');
Route::post('admin', 'AdminController@store')->name('admin.store')->middleware('admin');
Route::match(['get', 'head'], 'admin/create', 'AdminController@create')->name('admin.create');
Route::delete('admin/{user}', 'AdminController@destroy')->name('admin.destroy');
Route::match(['put', 'path'], 'admin/{user}', 'AdminController@update')->name('admin.update')->middleware('admin');
Route::get('admin/{user}/edit', 'AdminController@edit')->name('admin.edit')->middleware('admin');
Route::get('admin/{user}/destroy', 'AdminController@destroyForm')->name('admin.delete')->middleware('admin');


Route::get('/', function () {
    return redirect('login');
});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
