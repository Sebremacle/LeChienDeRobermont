<!-- Stored in resources/views/Admin/app.blade.php -->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titre') - Administration</title>
    </head>
    <body>
        <header>
            <h1>Administration</h1>
        </header>
        <main>
            @yield('contenu')
        </main>
    </body>
</html>