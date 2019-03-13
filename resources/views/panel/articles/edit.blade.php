@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.edit_title') }}</h1>
    <form id="frmArticle" action="/panel/articles/{{ $article->id }}/" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ csrf_token() }}" id="token">
        <input id="article-id" type="hidden" value="{{ $article->id }}" />        
        @include('panel.articles.form')
        <div class="text-centered py-2">
            <button id="btnSave" type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>

    <script>
        $("#btnSave").click(function(e){
            e.preventDefault();
            var token = $("#token").val();

            var formData = new FormData($('#frmArticle')[0]);

            $.ajax({
                url: "/api/articles/"+$("#article-id").val(),
                headers: {
                    "X-CSRF-TOKEN": token
                },
                type: "POST",
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