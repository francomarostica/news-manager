@extends('layouts.panel')
@section('content')
    <h1>{{ __('categories.add_title') }}</h1>
    <form action="/panel/categories" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="txtName">Nombre</label>
                <input id="txtName" name="title" type="text" class="form-control" value="" />
            </div>
        </div>
        <div class="text-centered py-2">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection