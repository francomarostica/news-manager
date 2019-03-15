@extends('layouts.panel')
@section('content')
    <h1>{{ __('testing.title') }}</h1>
    <form id="frmProfile" action="/panel/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ csrf_token() }}" id="token">

        <div class="testing-dialog">
            <div class="title">Enviar notificación de prueba</div>
            <div class="content">
                <div class="form-group">
                    <input id="txtMessage" name="message" type="text" class="form-control" value="" required/>
                </div>
                <div class="form-group py-4 text-center">
                    <button id="btnSendNotification" type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $("#btnSendNotification").click(function(){
            var message = {
                user: "fran",
                message: $("#txtMessage").val()
            };
            axios.post('/public_notifications', message).then(response => {
                console.log(response.data);
            });
        });
    </script>
@endsection