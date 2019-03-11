<!DOCTYPE html>
    <html lang="es">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        <div class="container">
            <div class="alert alert-danger">
                Este sitio web es para fines de ejemplo. Las noticias y fotografías corresponden al diario <a href='https://www.lavoz.com.ar'>La voz del interior</a>
            </div>
        </div>
        @yield('content')
    </body>
</html>