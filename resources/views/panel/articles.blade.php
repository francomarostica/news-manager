@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.title') }}</h1>
    @foreach ($articles as $article)
        <div class="article-list row">
            <div class="col-md-3">
                <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
            </div>
            <div class="col-md-6">
                {{ $article->title }}
            </div>
        </div>
    @endforeach
@endsection