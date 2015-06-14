@extends('Admin.app')

@section('titre', 'Ajout d\'un article')

@section('contenu')
    
<a href="{{ URL::asset('/admin/article') }}"><input type="button" value="Retour"> </a>
<h1>Ajouter un article</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ URL::route('admin.article.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" required="required" />
        </div>
        
        <div class="form-group">
            <label for="rubrique_id">ID Rubrique</label>
            <input type="text" name="rubrique_id" id="rubrique_id" required="required" />

            
            
        </div>
        
        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea name="texte" id="texte" required="required" /></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" required="required" />
        </div>

        
        <div class="form-group">
            <label for="home">Page d'accueil</label>
            <select name="home" id="home">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

        </div>
        
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <input type="submit" />
    </form>
@stop