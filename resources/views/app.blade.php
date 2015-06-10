<!-- Stored in resources/views/app.blade.php -->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Le chien de Robermont ASBL - @yield('titre')</title>

        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" id="slb_core-css" href="fonts/stylesheet.css" type="text/css" media="all">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/js.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery-migrate.min.js') }}"></script>
    </head>
    <body>
        <header class="fixe">
            <div class="clearfix" id="top">
                <div class="bg1 small-9 large-10 columns text-right"> 
                    <div class="hide-for-medium-down">
                        <div class="hide-for-medium-down">Voie Mélotte, s/n – 4030 Grivegnée / tél: 04 365 27 89</div>
                    </div>
                    <div class="show-for-medium-down text-left">Le Chien de robermont</div>
                </div> 
                <a href="#contact" id="lien-contact" class="hide-for-medium-down medium-2 columns text-center" data-page="#contact-page">Contacts</a>
                <a href="./Le chien de Robermont ASBL_files/Le chien de Robermont ASBL.html" id="show-menu" class="show-for-medium-down small-3 columns text-center">MENU</a>
            </div>
            <nav id="navigation" style="display: block;">
                <div class="text-center columns large-2 medium-12" id="logo">
                    <a href="#" id="home" data-page="#section1">
                        <img src="{{ URL::asset('img/logo.png') }}">
                        <br>Accueil
                    </a>
                </div>
                <div class="columns medium-12 large-10">
                    <ul class="clearfix text-center " id="menu">
                        @include('menu')
                    </ul>
                </div>
            </nav>
        </header>
        @yield('contenu')
        <script type="text/javascript" src="{{ URL::asset('js/jquery.form.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/lib.core.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/lib.view.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/client.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/client(1).js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/tag.item.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/tag.ui.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/handler.image.js') }}"></script>
    </body>
</html>