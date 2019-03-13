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
    <div id="articles-list">
        @foreach ($articles as $article)
            <div class="article-list-item row">
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
                            <input type="hidden" value="{{ csrf_token() }}" id="token">
                            <input type="hidden" value="{{ $article->id }}" id="article-id">
                            <a class="btn btn-primary" href="/panel/articles/{{ $article->id }}/edit">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </a>
                            <button type="submit" class="btn btn-danger delete" href="/panel/articles/delete">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        $("#articles-list").on("click", ".delete", function(e){
            e.preventDefault();
            var item = $(this).closest(".article-list-item");
            var article_id = $("#article-id").val();
            var route = "http://127.0.0.1:8000/api/articles/"+article_id;
            var token = $("#token").val();

            $.ajax({
                url: route,
                headers: {
                    "X-CSRF-TOKEN": token
                },
                type: "DELETE",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    var response = data.response;
                    var error = data.errors;

                    if(error!=undefined){
                        swal("Error!", error, "error");
                    } else {
                        item.fadeOut();
                        swal("Operación realizada!", response, "success");
                    }
                }
            });
        });
    </script>
@endsection