@extends('layouts.panel')
@section('content')
    <h1>{{ __('articles.add_title') }}</h1>
    <form action="/panel/articles" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-md-9">
                <label for="txtTitle">Título</label>
                <input id="txtTitle" name="title" type="text" class="form-control" value="" />
            </div>
            <div class="col-md-9">
                    <label for="txtCategory">Categoria</label>
                    <select id="txtCategory" name="category_id" type="text" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->url }}">{{ $category->title }}</option>
                    @endforeach
                    </select>
                </div>
            <div class="col-md-12 py-2">
                <label for="txtDescription">Description</label>
                <textarea id="txtDescription" name="description" type="text" class="form-control"></textarea>
            </div>
            <div class="col-md-12 py-2">
                <input id="btnFile" name="image" type="file">
            </div>
        </div>
        <div class="text-centered py-2">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
@endsection