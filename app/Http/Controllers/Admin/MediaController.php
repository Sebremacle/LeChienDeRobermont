<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Session;
use App\Http\Controllers\Controller;
use App\Media;

class MediaController extends Controller {

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
	public function index()
	{
		$medias = Media::all();
        return view('Admin.Media.index', ['medias' => $medias]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('Admin.Media.create');
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
            'photoMiniature' => 'required',
        ]);
        
        // Transformation du titre en 'slug'
        $baseNomPhoto = strtolower(str_replace(' ', '-', trim($request->input('titre'))));
        
        // Upload des photos    
        $nomPhoto = $baseNomPhoto . '.' . $request->file('photo')->getClientOriginalExtension();
        $nomPhotoMiniature = $baseNomPhoto . '_miniature.' . $request->file('photoMiniature')->getClientOriginalExtension();

        $request->file('photo')->move(
            base_path() . '/public/uploads/medias/', $nomPhoto
        );
        $request->file('photoMiniature')->move(
            base_path() . '/public/uploads/medias/', $nomPhotoMiniature
        );
        
        // Ajout dans la DB
        $media = new Media;
        $media->titre          = $request->input('titre');
        $media->photo          = $nomPhoto;
        $media->photoMiniature = $nomPhotoMiniature;
        $media->save();
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'Le média à bien été crée !');
        return redirect()->route('admin.media.index');
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$media = Media::findOrFail($id);
        return view('Admin.Media.show', ['media' => $media]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$media = Media::findOrFail($id);
        return view('Admin.Media.edit', ['media' => $media]);
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
        $media = Media::findOrFail($id);
        
        // Transformation du titre en 'slug'
        $baseNomPhoto = strtolower(str_replace(' ', '-', trim($request->input('titre'))));
        
        // Vérifier si une des images envoyées à changer 
        if(!empty($request->file('photo'))){
            
            // Suppression de l'ancienne photo
            unlink(base_path() . '/public/uploads/medias/'.$media->photo);
            
            // Upload de la nouvelle photo
            $nomPhoto = $baseNomPhoto . '.' . $request->file('photo')->getClientOriginalExtension();

            // Déplacement de la nouvelle photo
            $request->file('photo')->move(
                base_path() . '/public/uploads/medias/', $nomPhoto
            );
            
            // Modification du nom de la photo du media dans la DB
            $media->photo = $nomPhoto;
            
        }elseif(!empty($request->file('photoMiniature'))){
            
            // Suppression de l'ancienne photo miniature
            unlink(base_path() . '/public/uploads/medias/'.$media->photoMiniature);
            
            // Upload de la nouvelle photo miniature
            $nomPhotoMiniature = $baseNomPhoto . '_miniature.' . $request->file('photoMiniature')->getClientOriginalExtension();

            // Déplacement de la nouvelle photo miniature
            $request->file('photoMiniature')->move(
                base_path() . '/public/uploads/medias/', $nomPhotoMiniature
            );
            
            // Modification du nom de la photo miniature du media dans la DB
            $media->photo = $nomPhotoMiniature;
            
        };
        
        // Si aucune nouvelle image n'a été envoyée MAIS que le titre du media à changé alors on remplace le nom des images par le nouveau titre
        if($media->titre != $request->input('titre')){
            
            if(empty($request->file('photo'))){
            
                // Changement du nom de la photo "pathinfo" pour récupérer juste l'extension de l'ancien fichier, vu que celle-ci ne change pas
                $nomPhoto = $baseNomPhoto . '.' . pathinfo(base_path() . '/public/uploads/medias/'.$media->photo)['extension'];
                rename(base_path() . '/public/uploads/medias/'.$media->photo, base_path() . '/public/uploads/medias/'.$nomPhoto);
                $media->photo = $nomPhoto;
                
            }
            
            if(empty($request->file('photoMiniature'))){
            
                // Changement du nom de la photo "pathinfo" pour récupérer juste l'extension de l'ancien fichier, vu que celle-ci ne change pas
                $nomPhotoMiniature = $baseNomPhoto . '_miniature.' . pathinfo(base_path() . '/public/uploads/medias/'.$media->photoMiniature)['extension'];
                rename(base_path() . '/public/uploads/medias/'.$media->photoMiniature, base_path() . '/public/uploads/medias/'.$nomPhotoMiniature);
                $media->photoMiniature = $nomPhotoMiniature;
                
            }
            
        }
        
        // Remplacement du titre
        $media->titre = $request->input('titre');

        // Enregistrement du media
        $media->save(); 
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'Le média à bien été modifié !');
        return redirect()->route('admin.media.index');
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
        $media = Media::find($id);
        $media->delete();
        
        // Redirection vers l'accueil des médias
        \Session::flash('flash_message', 'Le média à bien été supprimé !');
        return redirect()->route('admin.media.index');
	}

}
