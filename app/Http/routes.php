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

Route::get('/', array('as' => 'accueil', 'uses' => 'RubriqueController@index'));

// Routes de l'admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    
    // Route pour les articles
    Route::get('articles', array('as'=> 'admin_articles', function(){
        return 'Gestion des articles dans l\'admin';
    }));
    
    // Route pour les médias
    Route::get('medias', array('as'=> 'admin_medias', function(){
        return 'Gestion des medias dans l\'admin';
    }));
    
    // Route pour le logout
    Route::get('logout', array('as' => 'accueil', 'uses' => 'Auth\AuthController@logout'));
    
});

// Gestion du menu
View::creator('layouts.menu', function($view)
{
    $view->with('rubriques', Rubrique::orderBy('tri', 'ASC')->get());
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
