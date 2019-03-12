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
        <!--
        <div class="form-group py-4 text-center">
            <button class="btn btn-primary">Guardar</button>
        </div>
        -->
    </form>
@endsection