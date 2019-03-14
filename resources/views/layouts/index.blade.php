<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NewsManager - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/breaking-news-ticker.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/breaking-news-ticker.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <header>
            @include('layouts.header')
        </header>
        @yield("content");
    </body>
    <footer class="text-center">
        <a href="https://github.com/fmarostica/news-manager">
            <img src="/images/GitHub-Mark-Light-32px.png" alt="Follow in GitHub.com" />
            <span>Follow the project on GitHub.com</span>
        </a>
        <div class="breaking-news-ticker" id="newsTicker1">
        <div class="bn-label">NEWS</div>
        <div class="bn-news">
            <ul>
                <li><a href="#">1.1. There many variations of passages of Lorem Ipsum available</a></li>
                <li><a href="#">1.2. Ipsum is simply dummy text of the printing and typesetting industry</a></li>
                <li><a href="#">1.3. Lorem Ipsum is simply dummy text of the printing and typesetting industry</a></li>
                <li><a href="#">1.4. Lorem simply dummy text of the printing and typesetting industry</a></li>
                <li><a href="#">1.5. Ipsum is simply dummy of the printing and typesetting industry</a></li>
                <li><a href="#">1.6. Lorem Ipsum simply dummy text of the printing and typesetting industry</a></li>
                <li><a href="#">1.7. Ipsum is simply dummy text of the printing typesetting industry</a></li>
            </ul>
        </div>
        <div class="bn-controls">
            <button><span class="bn-arrow bn-prev"></span></button>
            <button><span class="bn-action"></span></button>
            <button><span class="bn-arrow bn-next"></span></button>
        </div>
    </footer>
    <script>
        $('#newsTicker1').breakingNews({
            position : 'fixed-bottom',
            borderWidth: 3,
            height: 50,
            themeColor: '#ce2525'
        });
    </script>
</html>