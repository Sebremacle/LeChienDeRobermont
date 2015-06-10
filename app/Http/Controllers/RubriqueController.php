<?php namespace App\Http\Controllers;

use App\Article;
use App\Rubrique;
use App\Media;

class RubriqueController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Rubrique Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Affiche l'index des rubriques
	 *
	 * @return Response
	 */
	public function index()
	{
        $articleAccueil = Article::find(1)->where('home', '=', 1)->first();
        
        $rubriques = Rubrique::with('articles')->orderBy('tri', 'ASC')->get();
        $medias = Media::all();
        
        return view('Rubrique.index', ['articleAccueil' => $articleAccueil, 'rubriques' => $rubriques, 'medias' => $medias]);
	}

}
