@extends('layouts.index')
@section('title', 'home')
@section('content')
    <div class="container">
        <section>
            <div class="row">
                
            </div>
        </section>
        <section>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6">
                        <article class="articlebox medium">
                            <a href="#">
                                <img class="image" src="{{ $article->image }}" />
                            </a>
                            <div class="titlebox">
                                <div class="category"><a href="{{ $article->category->slug }}">{{ $article->category->title }}</a></div>
                                <h1 class="title">{{ $article->title }}</h1>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection