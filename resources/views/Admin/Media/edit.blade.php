@extends('Admin.app')

@section('titre', 'Liste des médias')

@section('contenu')
    <h1>Editer {{ $media->titre }}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ URL::route('admin.media.update', $media->id) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Modifier le titre</label>
            <input type="text" name="titre" id="titre" value="{{ $media->titre }}" required="required" />
        </div>

        <div class="form-group">
            <label for="photo">Modifier la photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" />
        </div>

        <div class="form-group">
            <label for="photoMiniature">Modifier la photo Miniature</label>
            <input type="file" name="photoMiniature" id="photoMiniature" accept="image/*" />
        </div>
        
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <input type="submit" />
    </form>
@stop