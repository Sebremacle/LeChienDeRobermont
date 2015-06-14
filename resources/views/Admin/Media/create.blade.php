@extends('Admin.app')

@section('titre', 'Ajout d\'un media')

@section('contenu')
<a href="{{ URL::asset('/admin/media') }}"><input type="button" value="Retour"> </a>
    <h1>Ajouter un media</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ URL::route('admin.media.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" required="required" />
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" required="required" />
        </div>

        <div class="form-group">
            <label for="photoMiniature">Photo Miniature</label>
            <input type="file" name="photoMiniature" id="photoMiniature" accept="image/*" required="required" />
        </div>
        
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <input type="submit" />
    </form>
@stop