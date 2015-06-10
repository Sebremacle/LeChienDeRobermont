@extends('Admin.app')

@section('titre', 'Liste des médias')

@section('contenu')
    <h1>Liste des médias</h1>
    @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
    <ul>
        @foreach($medias as $media)
            <li>
                {{ $media->titre }}
                <a href="{{ URL::route('admin.media.edit', $media->id) }}">Editer</a>
                <form method="post" action="{{ URL::route('admin.media.destroy', $media->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="submit" value="Supprimer" />
                </form>
            </li>
        @endforeach
    </ul>
@stop