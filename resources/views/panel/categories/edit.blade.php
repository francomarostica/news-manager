@extends('layouts.panel')
@section('content')
    <h1>{{ __('categories.edit_title') }}</h1>
    <form id="frmCategory" action="/panel/categories/{{ $category->id }}/" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input id="category-id" type="hidden" value="{{ $category->id }}" />     
        <div class="row">
            <div class="col-md-6">
                <label for="txtName">Nombre</label>
                <input id="txtName" name="title" type="text" class="form-control" value="{{ $category->title }}" />
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
            var token = $("#token").val();

            var formData = new FormData($('#frmCategory')[0]);

            $.ajax({
                url: "/api/categories/"+$("#category-id").val(),
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
                        window.location.replace("/panel/categories");
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