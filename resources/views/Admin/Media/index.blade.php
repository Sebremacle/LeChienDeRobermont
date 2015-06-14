@extends('Admin.app')

@section('titre', 'Liste des médias')

@section('contenu')
<a href="{{ URL::asset('/admin/media/create') }}"><input type="button" value="Ajouter"> </a>
    <h1>Liste des médias</h1>
    @if(Session::has('flash_message'))
        <div class="success">{{ Session::get('flash_message') }}</div>
    @endif
    
    <table width="100%">
        @foreach($medias as $media)
        <tr>
            <td width="20%"><img width="100%" src="{{ URL::asset('/uploads/medias/') }}/{{ $media->photoMiniature }}" alt="{{ $media->titre }}"></td>
            <td width="40%">{{ $media->titre }}</td>
            <td width="20%"><a href="{{ URL::route('admin.media.edit', $media->id) }}">Editer</a></td>
            <td width="20%"><form method="post" action="{{ URL::route('admin.media.destroy', $media->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="submit" value="Supprimer" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    

@stop