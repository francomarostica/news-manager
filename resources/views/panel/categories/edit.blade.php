@extends('layouts.panel')
@section('content')
    <h1>{{ __('categories.edit_title') }}</h1>
    <form action="/panel/categories/{{ $category->id }}/" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <label for="txtName">Nombre</label>
                <input id="txtName" name="title" type="text" class="form-control" value="{{ $category->title }}" />
            </div>
        </div>
        <div class="text-centered py-2">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection