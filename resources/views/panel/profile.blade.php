@extends('layouts.panel')
@section('content')
    <h1>{{ __('profile.title') }}</h1>
    <form id="frmProfile" action="/panel/profile" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ csrf_token() }}" id="token">
        <div class="row">
            <div class="col-md-3">
                <label for="txtName">Nombre</label>
                <input id="txtName" name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" />
            </div>
            <div class="col-md-3">
                <label for="txtLastName">Apellido</label>
                <input id="txtLastName" name="last_name" type="text" class="form-control" value="{{ Auth::user()->last_name }}" />
            </div>
            <div class="col-md-6">
                <label for="txtEmail">Dirección de correo</label>
                <input id="txtEmail" name="email" type="email" class="form-control" value="{{ Auth::user()->email }}" />
            </div>
        </div>
        <div class="form-group py-4 text-center">
            <button id="btnSave" type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    <script>
        $("#btnSave").click(function(e){
            e.preventDefault();
            var token = $("#token").val();

            var formData = new FormData($('#frmProfile')[0]);
            $.ajax({
                url: "/api/profile",
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
                    var response = data.response;
                    
                    if(error!=undefined){
                        swal("Error!", error, "error");
                    } else {
                        swal("Operación realizada!", response, "success");
                    }
                }
            });
        });

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