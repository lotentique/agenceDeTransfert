<?php
use Illuminate\Http\Request;
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('detail', 'api\\DetailController@detail');
        Route::post('retrais', 'api\\TransfertController@retrais');
        Route::post('retrais/effectue', 'api\\TransfertController@effectueRetrait');
        Route::post('transfert/verif', 'api\\TransfertController@verif');
        Route::post('transfert', 'api\\TransfertController@transfert');
        Route::post('caisse/ajout', 'api\\TransfertController@ajoutCaisse');
        Route::post('caisse/retirais', 'api\\TransfertController@retiraisCaisse');
    });
});
Route::group(['namespace' => 'Api'], function () {
   
    Route::post('retrais/effectue', 'TransfertController@effectueRetrait')->middleware('auth:api');
    //Route::post('verifNume', 'TransfertController@verif')->middleware('jwt.auth');
});