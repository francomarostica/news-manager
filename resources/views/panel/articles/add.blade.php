@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.add_title') }}</h1>
    <form action="/">
        <div class="row">
            <div class="col-md-12">
                <label for="txtTitle">Título</label>
                <input id="txtTitle" type="text" class="form-control" value="" />
            </div>
            <div class="col-md-12 py-2">
                <label for="txtDescription">Description</label>
                <textarea id="txtDescription" type="text" class="form-control"></textarea>
            </div>
        </div>
        <div class="text-centered py-2">
            <button class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection