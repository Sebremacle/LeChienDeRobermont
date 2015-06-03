<?php $iDataRight=1 ?>
<?php $iLoopMenu=2 ?>

@foreach ($rubriques as $rubrique)
    <li><a href="#{{ $rubrique->slug }}" id="nav{{ $iLoopMenu }}" class="bg-{{ $rubrique->slug }} columns large-3" data-right="{{ $iDataRight }}00%" data-page="#section{{ $iLoopMenu }}">{{ $rubrique->titre }}</a></li>
    
    <?php $iDataRight++ ?>
    <?php $iLoopMenu++ ?>
@endforeach
<li class="show-for-medium-down"><a href="#contact" id="lien-contact2" data-page="#contact-page">Contacts</a></li>