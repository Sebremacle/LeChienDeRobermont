<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Article;
use App\Rubrique;

class ArticleController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Rubrique Controller
	|--------------------------------------------------------------------------
	*/


	/**
	 * Affiche la liste des articles
	 *
	 * @return Response
	 */
	public function liste()
	{
        return 'afficher la liste des articles';
	}

}
