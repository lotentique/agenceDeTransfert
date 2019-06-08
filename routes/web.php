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

//les routes pour crud utilisateurs
Route::group(['namespace' => 'Admin'], function () {
    Route::get('Utilisateurs', 'UtilisateursController@index')->name('Utilisateurs.index')->middleware('admin');
    Route::post('admin/ajax', 'UtilisateursController@ajax')->name('ajax')->middleware('admin');
    Route::post('admin/Rptransfert', 'UtilisateursController@Rptransfert')->name('ajax2')->middleware('admin');
    Route::post('admin/Validation', 'UtilisateursController@Validation')->name('ajax3')->middleware('admin');
    Route::post('admin/ajout', 'UtilisateursController@store')->name('ajax4')->middleware('admin');
    Route::post('admin/Modif', 'UtilisateursController@edit')->name('ajax5')->middleware('admin');
    Route::post('admin/update', 'UtilisateursController@update')->name('ajax6')->middleware('admin');
    Route::post('admin/Supp', 'UtilisateursController@destroy')->name('ajax7')->middleware('admin');
    Route::post('admin/nbrU', 'UtilisateursController@nbrU')->name('ajax8')->middleware('admin');

});


//les routes pour crud admin
Route::group(['namespace' => 'Admin'], function () {
    Route::get('admin/admin/{user}/edit', 'AdminController@edit')->name('admin.edit')->middleware('admin');
    Route::get('admin/exportUtilisateur', 'AdminController@exportUtilisateur')->name('listeUtilisateur')->middleware('admin');
    Route::get('admin/exportTransfert', 'AdminController@exportTransfert')->name('listeTransfert')->middleware('admin');

    Route::get('admin/exportPoint', 'AdminController@exportPoint')->name('listePoint')->middleware('admin');
    Route::match(['put', 'path'], 'admin/admi/{user}', 'AdminController@modifProfil')->name('admin.profil')->middleware('admin');
    Route::get('admin/import', 'AdminController@indexImport')->name('importer')->middleware('admin');
    Route::post('admin/submit', 'AdminController@submit')->name('im')->middleware('admin');
});


Route::get('/admin', 'HomeController@index')->name('admin')->middleware('admin');

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
    Route::post('admin/PTransfert/Hcaisse', 'PTransfertController@Hcaisse')->middleware('admin');
});
//fin crud point de transfert

//les routes de la transaction
Route::group(['namespace' => 'Admin'], function () {
Route::match(['get', 'head'], 'admin/Transaction', 'TransactionController@index')->name('Transaction.index')->middleware('admin');

});

//fin

// les routes effectue un transfert
Route::group(['namespace' => 'Agent'], function () {
    Route::match(['get', 'head'], 'agent/trensfert/saisie', 'TransfertController@index')->name('saisie')->middleware('agent');
Route::post('agent/trensfert/saisie', 'TransfertController@verif')->name('saisie.confirm')->middleware('agent');

    Route::match(['get', 'head'], 'agent/trensfert', 'TransfertController@transfer')->name('trensfert')->middleware('agent');
    Route::post('agent/trensfert/confirme', 'TransfertController@confirm')->name('trensfert.confirm')->middleware('agent');
    Route::post('agent/trensfert', 'TransfertController@store')->name('trensfert.store')->middleware('agent');
    Route::match(['get', 'head'], 'agent/code', 'TransfertController@codage')->name('code')->middleware('agent');
    Route::match(['get', 'head'], 'agent/email', 'TransfertController@st')->name('emails.welcome')->middleware('agent');
});


// les routes effectue un retrais
Route::group(['namespace' => 'Agent'], function () {
    Route::post('agent/retrait/confirme', 'RetraitController@retraitEffectue')->name('retrait.confirm')->middleware('agent');
    Route::get('agent/retrait', 'RetraitController@retrait')->name('retrait')->middleware('agent');
});


Route::group(['namespace' => 'Agent'], function () {
    Route::get('agent', 'AgentController@index')->name('agent')->middleware('agent');
    Route::post('agent/ajout', 'AgentController@ajout')->name('ajout')->middleware('agent');
    Route::post('agent/retirais', 'AgentController@retirais')->name('retirais')->middleware('agent');
});

//les route BCM
Route::group(['namespace' => 'Bcm'], function () {
    Route::get('bcm', 'BcmController@index')->name('bcm')->middleware('bcm');

});

/*Route::get('agent', function () {
    return view('agent.Agent');
})->name('agent')->middleware('agent');*/
Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();

//la carte
Route::group(['namespace' => 'Admin'], function () {
    Route::match(['get', 'head'], 'admin/carte', 'PTransfertController@carte')->name('carte.index')->middleware('admin');

});
//fin
