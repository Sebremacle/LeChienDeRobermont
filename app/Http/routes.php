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

/*Route::get('{rubrique_slug}',[
    'as' => 'rubrique', 
    'uses' => 'RubriqueController@detail'
    ]
)->where('rubrique_slug', '[a-z0-9-]+');*/

Route::get('/', 'RubriqueController@index');

View::creator('layouts.menu', function($view)
{
    $view->with('rubriques', Rubrique::all());
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
