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
Route::group(['namespace'=>'Admin'], function () {
    Route::match(['get', 'head'], 'admin/agents', 'AgentController@index')->name('agents.index')->middleware('admin');
    Route::post('admin/agents', 'AgentController@store')->name('agents.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/agents/create', 'AgentController@create')->name('agents.create');
    Route::delete('admin/agents/{user}', 'AgentController@destroy')->name('agents.destroy');
    Route::match(['put', 'path'], 'admin/agents/{user}', 'AgentController@update')->name('agents.update')->middleware('admin');
    Route::get('admin/agents/{user}/edit', 'AgentController@edit')->name('agents.edit')->middleware('admin');
    Route::get('admin/agents/{user}/destroy', 'AgentController@destroyForm')->name('agents.delete')->middleware('admin');
});

//les routes pour crud bcm
Route::group(['namespace'=>'Admin'], function () {
    Route::match(['get', 'head'], 'admin/bcm', 'BcmController@index')->name('bcm.index')->middleware('admin');
    Route::post('admin/bcm', 'BcmController@store')->name('bcm.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/bcm/create', 'BcmController@create')->name('bcm.create');
    Route::delete('admin/bcm/{user}', 'BcmController@destroy')->name('bcm.destroy');
    Route::match(['put', 'path'], 'admin/bcm/{user}', 'BcmController@update')->name('bcm.update')->middleware('admin');
    Route::get('admin/bcm/{user}/edit', 'BcmController@edit')->name('bcm.edit')->middleware('admin');
    Route::get('admin/bcm/{user}/destroy', 'BcmController@destroyForm')->name('bcm.delete')->middleware('admin');
});

//les routes pour crud admin
Route::group(['namespace'=>'Admin'], function () {
    Route::match(['get', 'head'], 'admin/admin', 'AdminController@index')->name('admin.index')->middleware('admin');
    Route::post('admin/admin', 'AdminController@store')->name('admin.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/admin/create', 'AdminController@create')->name('admin.create');
    Route::delete('admin/admin/{user}', 'AdminController@destroy')->name('admin.destroy');
    Route::match(['put', 'path'], 'admin/admin/{user}', 'AdminController@update')->name('admin.update')->middleware('admin');
    Route::get('admin/admin/{user}/edit', 'AdminController@edit')->name('admin.edit')->middleware('admin');
    Route::get('admin/admin/{user}/destroy', 'AdminController@destroyForm')->name('admin.delete')->middleware('admin');
    Route::match(['put', 'path'], 'admin/admi/{user}', 'AdminController@modifProfil')->name('admin.profil')->middleware('admin');
});

Route::get('admin', function () {
    return view('admin');
});

Route::get('/', function () {
    return redirect('login');
});


//Les routes pour changer le nom et le logo de l'application
Route::group(['namespace'=>'Admin'], function () {
    Route::match(['get', 'head'], 'conf', 'ChangerNLController@index')->name('ChangerNL')->middleware('admin');
    Route::post('conf/changerNom','ChangerNLController@changerNom')->name('changerNom')->middleware('admin');
    Route::post('conf/changerLogo','ChangerNLController@changerLogo')->name('changerLogo')->middleware('admin');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
