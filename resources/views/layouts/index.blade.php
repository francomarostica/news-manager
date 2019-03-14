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
        <section id="MainSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <article class="articlebox primary">
                            <a href="#">
                                <img class="image" src="/images/article_samples/1.jpg" />
                            </a>
                            <div class="titlebox">
                                <div class="category">Article Category</a></div>
                                <h1 class="title">Article Title</h1>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <article class="articlebox medium">
                                    <a href="#">
                                        <img class="image" src="/images/article_samples/2.jpg" />
                                    </a>
                                    <div class="titlebox">
                                        <div class="category">Article Category</a></div>
                                        <h1 class="title">Article Title</h1>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="articlebox medium">
                                    <a href="#">
                                        <img class="image" src="/images/article_samples/3.jpg" />
                                    </a>
                                    <div class="titlebox">
                                        <div class="category">Article Category</a></div>
                                        <h1 class="title">Article Title</h1>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="articlebox medium">
                                    <a href="#">
                                        <img class="image" src="/images/article_samples/4.jpg" />
                                    </a>
                                    <div class="titlebox">
                                        <div class="category">Article Category</a></div>
                                        <h1 class="title">Article Title</h1>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="articlebox medium">
                                    <a href="#">
                                        <img class="image" src="/images/article_samples/5.jpg" />
                                    </a>
                                    <div class="titlebox">
                                        <div class="category">Article Category</a></div>
                                        <h1 class="title">Article Title</h1>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="SecondarySection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <article class="articlebox">
                                <a href="#">
                                    <img class="image" src="/images/article_samples/6.jpg" />
                                </a>
                                <div class="titlebox">
                                    <div class="category">Article Category</a></div>
                                    <h1 class="title">Article Title</h1>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article class="articlebox">
                                <a href="#">
                                    <img class="image" src="/images/article_samples/7.jpg" />
                                </a>
                                <div class="titlebox">
                                    <div class="category">Article Category</a></div>
                                    <h1 class="title">Article Title</h1>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article class="articlebox">
                                <a href="#">
                                    <img class="image" src="/images/article_samples/8.jpg" />
                                </a>
                                <div class="titlebox">
                                    <div class="category">Article Category</a></div>
                                    <h1 class="title">Article Title</h1>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article class="articlebox">
                                <a href="#">
                                    <img class="image" src="/images/article_samples/9.jpg" />
                                </a>
                                <div class="titlebox">
                                    <div class="category">Article Category</a></div>
                                    <h1 class="title">Article Title</h1>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        
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