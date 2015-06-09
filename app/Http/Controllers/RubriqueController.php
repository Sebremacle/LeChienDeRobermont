<?php namespace App\Http\Controllers;

use App\Rubrique;
use App\Media;

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

            
        $rubriques = Rubrique::with('articles')->orderBy('tri', 'ASC')->get();
        $medias = Media::all();
        
        return view('Rubrique.index', ['rubriques'=>$rubriques, 'medias'=>$medias]);
	}

}
