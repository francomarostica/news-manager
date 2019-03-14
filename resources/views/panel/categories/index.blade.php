@extends('layouts.panel')
@section('commands-menu')
    <a class="btn btn-dark" href="/panel/categories/create">
        <span>{{ __('categories.add_title') }}</span>
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
        </svg>
    </a>
@endsection
@section('content')
    <h1>{{ __('categories.title') }}</h1>
    <div id="categories-list">
        @foreach ($categories as $category)
            <div class="article-list-item row" data-id="{{ $category->id }}">
                <div class="col-md-12">
                    <div class="article-list-item-content">
                        {{ $category->title }}
                    </div>
                    <div class="text-right">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-primary btn-sm" href="/panel/categories/{{ $category->id }}/edit">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm delete" href="/panel/categories/delete">
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
        $("#categories-list").on("click", ".delete", function(e){
            e.preventDefault();
            var item = $(this).closest(".category-list-item");
            var category_id = item.data("id");
            var route = "/api/categories/"+category_id;
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