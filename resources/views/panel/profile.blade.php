@extends('layouts.panel')
@section('content')
    <h1>{{ __('profile.title') }}</h1>
    <form action="/panel/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="txtName">Nombre</label>
                <input id="txtName" type="text" class="form-control" value="{{ Auth::user()->name }}" />
            </div>
            <div class="col-md-3">
                <label for="txtLastName">Apellido</label>
                <input id="txtLastName" type="text" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="txtEmail">Dirección de correo</label>
                <input id="txtEmail" type="email" class="form-control" value="{{ Auth::user()->email }}" />
            </div>
        </div>
        <div class="form-group py-4 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    <script>
        $("#btnSave").click(function(e){
            e.preventDefault();
            var token = $("#token").val();

            var formData = new FormData($('#frmArticle')[0]);

            $.ajax({
                url: "/api/profile/",
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
                    var respones = data.response;
                    
                    if(error!=undefined){
                        swal("Error!", error, "error");
                    } else {
                        swal("Operación realizada!", response, "success");
                    }
                }
            });
        });
        </script>
@endsection