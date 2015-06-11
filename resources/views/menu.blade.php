@foreach ($rubriques as $rubrique)
    <li><a href="#{{ $rubrique->slug }}" id="nav{{ $rubrique->tri +1 }}" class="bg-{{ $rubrique->slug }} columns large-3" data-right="{{ $rubrique->tri }}00%" data-page="#section{{ $rubrique->tri +1 }}">{{ $rubrique->titre }}</a></li>
@endforeach
<li class="show-for-medium-down"><a href="#contact" id="lien-contact2" data-page="#contact-page">Contacts</a></li>