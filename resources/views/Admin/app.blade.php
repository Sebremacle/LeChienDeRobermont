<!-- Stored in resources/views/Admin/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 
	<TITLE>Administration Le Chien de Robermont</TITLE>
	<!-- Styles CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/tabulous.css') }}">
        <script type="text/javascript" src="{{ URL::asset('js/tabulous.js') }}"></script>
</head>
<body>
	<header class="boxLarge">
		<img src="{{ URL::asset('img/logoAdmin.png') }}" alt="Logo Chien de Robermont">
		<h1 class="textCenter">Administration Le Chien de Robermont</h1>
		<ul class="menu inline textCenter">
			<a href="{{ URL::asset('admin/article') }}"><li>Gestion des articles</li></a>
			<a href="{{ URL::asset('admin/media') }}"><li>Gestion de la galerie</li></a>
			<a href="#"><li>Déconnexion</li></a>
		</ul>
	</header>
	
	<section id="page" class="boxCenter">
                @yield('contenu')
                	
		
	</section>

</body>
</html>


