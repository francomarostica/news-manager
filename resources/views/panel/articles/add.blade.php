@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.add_title') }}</h1>
    <form id="frmArticle" action="/panel/articles" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" value="{{ csrf_token() }}" id="token">
        <div class="row">
            <div class="col-md-9">
                <label for="txtTitle">Título</label>
                <input id="txtTitle" name="title" type="text" class="form-control" value="" />
            </div>
            <div class="col-md-3">
                    <label for="txtCategory">Categoria</label>
                    <select id="txtCategory" name="category_id" type="text" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->url }}">{{ $category->title }}</option>
                    @endforeach
                    </select>
                </div>
            <div class="col-md-12 py-2">
                <label for="txtDescription">Description</label>
                <textarea id="txtDescription" name="description" type="text" class="form-control"></textarea>
            </div>
            <div class="col-md-12 py-2">
                <input id="btnFile" name="image" type="file">
            </div>
        </div>
        <div class="text-centered py-2">
            <button id="btnSave" type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
    <script>
        $("#btnSave").click(function(e){
            e.preventDefault();
            var route = "http://127.0.0.1:8000/api/articles/";
            var token = $("#token").val();

            var formData = new FormData($('#frmArticle')[0]);

            $.ajax({
                url: route,
                headers: {
                    "X-CSRF-TOKEN": token
                },
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() 
                {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                    return myXhr;
                },
                beforeSend: function() 
                {
                    $("#status").empty();
                    var percentVal = '0%';
                    $('.progress-bar-wait').width(percentVal);
                    $('.percent').html(percentVal);
                },
                success: function(data){
                    var error = data.errors;
                    if(error!=undefined){
                        swal("Error!", error, "error");
                    } else {
                        window.location.replace("/panel/articles");
                    }
                }
            });
        });

        function preview_image(input){
            var $this = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    //$this.element.find(".img-cover").prop("src", e.target.result);
                }
                reader.readAsDataURL(input.files[0]);        
            }
        }

        function progressHandlingFunction(e){
            if(e.lengthComputable)
            {
                var max = e.total;
                var current = e.loaded;

                var Percentage = (current * 100)/max;

                $('.progress-bar-wait').width(Percentage+"%");
                $('.percent').html(Percentage.toFixed(2)+"%");

                if(Percentage >= 100)
                {
                    // process completed  
                }
            }
        }
    </script>
@endsection