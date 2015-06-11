<?php

use App\Rubrique;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Routes Publiques
|--------------------------------------------------------------------------
*/
Route::get('/', ['as' => 'accueil', 'uses' => 'RubriqueController@index']);


/*
|--------------------------------------------------------------------------
| Routes Administration
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    
    /*
    |--------------------------------------------------------------------------
    | Routes Administration : Articles
    |--------------------------------------------------------------------------
    */
    
    Route::resource('article', 'Admin\ArticleController');
    
    /*
    |--------------------------------------------------------------------------
    | Routes Administration : Médias
    |--------------------------------------------------------------------------
    */
    
    Route::resource('media', 'Admin\MediaController');
    
});


/*
|--------------------------------------------------------------------------
| Gestion du menu
|--------------------------------------------------------------------------
*/
View::creator('layouts.menu', function($view)
{
    $view->with('rubriques', Rubrique::orderBy('tri', 'ASC')->get());
});


/*
|--------------------------------------------------------------------------
| Authentificate
|--------------------------------------------------------------------------
*/
Route::controller('auth', 'Auth\AuthController');