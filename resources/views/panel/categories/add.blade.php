@extends('layouts.panel')
@section('content')
    <h1>{{ __('categories.add_title') }}</h1>
    <form action="/">
        <div class="row">
            <div class="col-md-6">
                <label for="txtName">Nombre</label>
                <input id="txtName" type="text" class="form-control" value="" />
            </div>
        </div>
        <div class="text-centered py-2">
            <button class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection