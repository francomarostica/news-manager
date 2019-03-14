@extends('layouts.index')
@section('title', 'home')
@section('content')
    <section id="MainSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <article class="articlebox primary">
                        <a href="#">
                            <img class="image" src="{{ $primaryArticle->image }}" />
                        </a>
                        <div class="titlebox">
                            <div class="category">{{ $primaryArticle->category_id }}</a></div>
                            <h1 class="title">{{ $primaryArticle->title }}</h1>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @foreach ($secondaryArticles as $article)
                            <div class="col-md-6">
                                <article class="articlebox medium">
                                    <a href="#">
                                        <img class="image" src="{{ $article->image }}" />
                                    </a>
                                    <div class="titlebox">
                                        <div class="category">{{ $article->category_id }}</a></div>
                                        <h1 class="title">{{ $article->title }}</h1>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <section id="SecondarySection">
            <div class="container">
                <div class="row">
                    @foreach ($businessArticles as $article)
                        <div class="col-md-3">
                            <article class="articlebox">
                                <a href="#">
                                    <img class="image" src="{{ $article->image }}" />
                                </a>
                                <div class="titlebox">
                                    <div class="category">{{ $article->category_id }}</a></div>
                                    <h1 class="title">{{ $article->title }}</h1>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
    
@endsection