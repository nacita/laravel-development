<html>
    <head>
        <title>@yield('judul')</title>

        <style>
            .kotak {
                border-style: solid;
            }
        </style>
    </head>
    <body>
        <h1 class="kotak">Tempat Header</h1>
        @yield('content')
        <h1 class="kotak">Tempat footer</h1>
    </body>
</html>
