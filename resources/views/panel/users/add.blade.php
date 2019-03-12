@extends('layouts.panel')
@section('content')
    <h1>{{ __('users.add_title') }}</h1>
    <form action="/">
        <div class="row">
            <div class="col-md-3">
                <label for="txtName">Nombre</label>
                <input id="txtName" type="text" class="form-control" value="" />
            </div>
            <div class="col-md-3">
                <label for="txtLastName">Apellido</label>
                <input id="txtLastName" type="text" class="form-control" value="" />
            </div>
            <div class="col-md-3">
                <label for="txtEmail">Dirección de correo</label>
                <input id="txtEmail" type="text" class="form-control" value="" />
            </div>
        </div>
        <div class="text-centered py-2">
            <button class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection