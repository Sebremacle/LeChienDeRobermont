<?php namespace App\Http\Controllers;

use App\Rubrique;

class RubriqueController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Rubrique Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Affiche l'index des rubriques
	 *
	 * @return Response
	 */
	public function index()
	{
        
        $rubriques = Rubrique::all();
        
        return view('Rubrique.index');
	}

}
