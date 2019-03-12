@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.edit_title') }}</h1>
    <form action="/panel/articles/{{ $article->id }}/" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        @include('panel.articles.form')
        
        <div class="text-centered py-2">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection