<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Session;
use App\Http\Controllers\Controller;
use App\Article;
use App\Rubrique;

class ArticleController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Media Controller
	|--------------------------------------------------------------------------
	*/
        
    
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function rubrique()
	{
		$rubriques = Rubrique::all();
        return view('Admin.Article.create', ['rubriques' => $rubriques]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::all();
        return view('Admin.Article.index', ['articles' => $articles]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('Admin.Article.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        
		$this->validate($request, [
            'titre' => 'required|max:255',
            'photo' => 'required',
        ]);
        
        // Transformation du titre en 'slug'
        $baseNomPhoto = strtolower(str_replace(' ', '-', trim($request->input('titre'))));
        
        // Upload des photos    
        $nomPhoto = $baseNomPhoto . '.' . $request->file('photo')->getClientOriginalExtension();

        $request->file('photo')->move(
            base_path() . '/public/uploads/articles/', $nomPhoto
        );

        
        // Ajout dans la DB
        $article = new Article;
        $article->titre          = $request->input('titre');
        $article->texte          = $request->input('texte');
        $article->rubrique_id    = $request->input('rubrique_id');
        $article->home           = $request->input('home');
        $article->photo          = $nomPhoto;
        $article->save();
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'L article à bien été crée !');
        return redirect()->route('admin.article.index');
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Media::findOrFail($id);
        return view('Admin.Article.show', ['article' => $article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
        return view('Admin.Article.edit', ['article' => $article]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $this->validate($request, [
            'titre' => 'required|max:255',
        ]);
        
		// Selectionné le media envoyé
        $article = Article::findOrFail($id);
        
        // Transformation du titre en 'slug'
        $baseNomPhoto = strtolower(str_replace(' ', '-', trim($request->input('titre'))));
        
        // Vérifier si une des images envoyées à changer 
        if(!empty($request->file('photo'))){
            
            // Suppression de l'ancienne photo
            unlink(base_path() . '/public/uploads/articles/'.$article->photo);
            
            // Upload de la nouvelle photo
            $nomPhoto = $baseNomPhoto . '.' . $request->file('photo')->getClientOriginalExtension();

            // Déplacement de la nouvelle photo
            $request->file('photo')->move(
                base_path() . '/public/uploads/articles/', $nomPhoto
            );
            
            // Modification du nom de la photo du media dans la DB
            $article->photo = $nomPhoto;
            
        
            
        };
        
        // Si aucune nouvelle image n'a été envoyée MAIS que le titre du media à changé alors on remplace le nom des images par le nouveau titre
        if($article->titre != $request->input('titre')){
            
            if(empty($request->file('photo'))){
            
                // Changement du nom de la photo "pathinfo" pour récupérer juste l'extension de l'ancien fichier, vu que celle-ci ne change pas
                $nomPhoto = $baseNomPhoto . '.' . pathinfo(base_path() . '/public/uploads/articles/'.$article->photo)['extension'];
                rename(base_path() . '/public/uploads/articles/'.$article->photo, base_path() . '/public/uploads/articles/'.$nomPhoto);
                $article->photo = $nomPhoto;
                
            }

            
        }
        
        // Remplacement 
        $article->titre          = $request->input('titre');
        $article->texte          = $request->input('texte');
        $article->rubrique_id    = $request->input('rubrique_id');
        $article->home           = $request->input('home');

        // Enregistrement du media
        $article->save(); 
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'L article à bien été modifié !');
        return redirect()->route('admin.article.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $article = Article::find($id);
        $article->delete();
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'L article à bien été supprimé !');
        return redirect()->route('admin.article.index');
	}

}
