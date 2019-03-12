@extends('layouts.panel')
@section('commands-menu')
    <a class="btn btn-primary" href="/panel/articles/create">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
        </svg>
    </a>
@endsection
@section('content')
    <h1>{{ __('articles.title') }}</h1>
    @foreach ($articles as $article)
        <div class="article-list row">
            <div class="col-md-3">
                <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
            </div>
            <div class="col-md-6">
                {{ $article->title }}
                <div>
                    <div class="badge badge-primary">
                        {{ $article->category_id }}
                    </div>
                    @if($article->published)
                        <div class="badge badge-success">
                            Publicado
                        </div>
                    @else
                        <div class="badge badge-danger">
                            No Publicado
                        </div>
                    @endif
                </div>
                <div class="text-right">
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" href="/panel/articles/delete">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="#fff" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection