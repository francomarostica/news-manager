@extends('layouts.panel')
@section('commands-menu')
    <a class="btn btn-primary" href="/panel/categories/create">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
        </svg>
    </a>
@endsection
@section('content')
    <h1>{{ __('categories.title') }}</h1>
    @foreach ($categories as $category)
        <div class="article-list row">
            <div class="col-md-3">
                <img class="image" src="{{ asset('images/categories/'.$category->id.'/'.$category->image.' ') }}" />
            </div>
            <div class="col-md-6">
                {{ $category->title }}
            </div>
        </div>
    @endforeach
@endsection