@extends('Admin.app')

@section('titre', 'Liste des articles')

@section('contenu')
<a href="{{ URL::asset('/admin/article') }}"><input type="button" value="Retour"> </a>
    <h1>Editer {{ $article->titre }}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ URL::route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Modifier le titre</label>
            <input type="text" name="titre" id="titre" value="{{ $article->titre }}" required="required" />
        </div>

        <div class="form-group">
            <label for="rubrique_id">ID Rubrique</label>
            <input type="text" name="rubrique_id" id="rubrique_id" value="{{ $article->rubrique_id }}" required="required" />
        </div>
        
        <div class="form-group">
            <label for="texte">Texte</label>
            <textarea name="texte" id="texte" required="required" />{{ $article->texte }}</textarea>
        </div>

        
        <div class="form-group">
            <label for="home">Page d'accueil (1 ou 0)</label>
            <input type="text" name="home" id="home" value="{{ $article->home }}" required="required" />
        </div>
        
        <div class="form-group">
            <label for="photo">Modifier la photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" />
        </div>


        
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <input type="submit" />
    </form>
@stop