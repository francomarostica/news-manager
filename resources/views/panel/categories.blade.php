@extends('layouts.panel')
@section('content')
    <h1>{{ __('categories.title') }}</h1>
    @foreach ($categories as $category)
        <div class="article-list row">
            <div class="col-md-3">
                <img class="image" src="{{ asset('images/articles/'.$category->id.'/'.$category->image.' ') }}" />
            </div>
            <div class="col-md-6">
                {{ $category->title }}
            </div>
        </div>
    @endforeach
@endsection