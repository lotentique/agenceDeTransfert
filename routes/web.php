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
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'MonLoginController@index')->name('login');
    Route::post('login', 'MonLoginController@store');
    Route::get('logout', 'MonLoginController@destroy')->name('logout');
});


//les routes pour crud agent
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/agents', 'AgentController@index')->name('agents.index')->middleware('admin');
    Route::post('admin/agents', 'AgentController@store')->name('agents.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/agents/create', 'AgentController@create')->name('agents.create');
    Route::delete('admin/agents/{user}', 'AgentController@destroy')->name('agents.destroy');
    Route::match(['put', 'path'], 'admin/agents/{user}', 'AgentController@update')->name('agents.update')->middleware('admin');
    Route::get('admin/agents/{user}/edit', 'AgentController@edit')->name('agents.edit')->middleware('admin');
    Route::get('admin/agents/{user}/destroy', 'AgentController@destroyForm')->name('agents.delete')->middleware('admin');
});

//les routes pour crud bcm
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/bcm', 'BcmController@index')->name('bcm.index')->middleware('admin');
    Route::post('admin/bcm', 'BcmController@store')->name('bcm.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/bcm/create', 'BcmController@create')->name('bcm.create');
    Route::delete('admin/bcm/{user}', 'BcmController@destroy')->name('bcm.destroy');
    Route::match(['put', 'path'], 'admin/bcm/{user}', 'BcmController@update')->name('bcm.update')->middleware('admin');
    Route::get('admin/bcm/{user}/edit', 'BcmController@edit')->name('bcm.edit')->middleware('admin');
    Route::get('admin/bcm/{user}/destroy', 'BcmController@destroyForm')->name('bcm.delete')->middleware('admin');
});

//les routes pour crud admin
Route::group(['namespace' => 'Admin'], function () {
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
})->middleware('admin');

Route::get('/', function () {
    return redirect('login');
});


//Les routes pour changer le nom et le logo de l'application
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'conf', 'ChangerNLController@index')->name('ChangerNL')->middleware('admin');
    Route::post('config/changer Nom', 'ChangerNLController@changerNom')->name('changerNom')->middleware('admin');
    Route::post('config/changerL ogo', 'ChangerNLController@changerLogo')->name('changerLogo')->middleware('admin');
});

//Les routes pour les tarif en interval
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/tarif', 'TarifIntervalController@index')->name('tarifInterval.liste')->middleware('admin');
    Route::match(['get', 'head'], 'admin/tarif/create', 'TarifIntervalController@create')->name('tarifInterval.create');
    Route::post('admin/tarif', 'TarifIntervalController@store')->name('tarifInterval.store')->middleware('admin');
    Route::match(['put', 'path'], 'admin/tarif/{tarif_interval}', 'TarifIntervalController@update')->name('tarifInterval.update')->middleware('admin');
    Route::get('admin/tarif/{tarif_interval}/edit', 'TarifIntervalController@edit')->name('tarifInterval.edit')->middleware('admin');
});
//Les routes pour les tarif en pourcentage
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/pourcentage', 'TarifPourcentageController@index')->name('tarifPourcentage.liste')->middleware('admin');
    Route::match(['get', 'head'], 'admin/pourcentage/create', 'TarifPourcentageController@create')->name('tarifPourcentage.create');
    Route::post('admin/pourcentage', 'TarifPourcentageController@store')->name('tarifPourcentage.store')->middleware('admin');
    Route::match(['put', 'path'], 'admin/pourcentage/{tarif_pourcentage}', 'TarifPourcentageController@update')->name('tarifPourcentage.update')->middleware('admin');
    Route::get('admin/pourcentage/{tarif_pourcentage}/edit', 'TarifPourcentageController@edit')->name('tarifPourcentage.edit')->middleware('admin');
});
//Les routes pour les tarif en interval
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/tarification', 'ParametreTarifController@index')->name('tarification')->middleware('admin');
    Route::post('admin/tarification', 'ParametreTarifController@store')->name('tarification.store')->middleware('admin');
    Route::match(['put', 'path'], 'admin/tarification/{parametre_applique}', 'ParametreTarifController@update')->name('tarification.update')->middleware('admin');
});


//les crud pour le point de transfert
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/PTransfert', 'PTransfertController@index')->name('PTransfert.index')->middleware('admin');
    Route::post('admin/PTransfert', 'PTransfertController@store')->name('PTransfert.store')->middleware('admin');
    Route::match(['get', 'head'], 'admin/PTransfert/create', 'PTransfertController@create')->name('PTransfert.create');
    Route::delete('admin/PTransfert/{Point_de_transferts}', 'PTransfertController@destroy')->name('PTransfert.destroy');
    Route::match(['put', 'path'], 'admin/PTransfert/{Point_de_transferts}', 'PTransfertController@update')->name('PTransfert.update')->middleware('admin');
    Route::get('admin/PTransfert/{Point_de_transferts}/edit', 'PTransfertController@edit')->name('PTransfert.edit')->middleware('admin');
    Route::get('admin/PTransfert/{Point_de_transferts}/destroy', 'PTransfertController@destroyForm')->name('PTransfert.delete')->middleware('admin');
});
//fin crud point de transfert

// les routes effectue un transfert 
Route::group(['namespace' => 'Agent'], function () {
    Route::match(['get', 'head'], 'agent/trensfert', 'TransfertController@index')->name('trensfert')->middleware('agent');
    Route::post('agent/trensfert/confirme', 'TransfertController@confirm')->name('trensfert.confirm')->middleware('agent');
    Route::post('agent/trensfert', 'TransfertController@store')->name('trensfert.store')->middleware('agent');
    //Route::match(['put', 'path'], 'admin/tarification/{parametre_applique}', 'ParametreTarifController@update')->name('tarification.update')->middleware('admin');

    Route::match(['get', 'head'], 'agent/code', 'TransfertController@codage')->name('code')->middleware('agent');
});

Route::get('agent', function () {
    return view('agent.Agent');
})->middleware('agent');
Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();
