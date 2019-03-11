@extends('layouts.index')
@section('title', 'home')
@section('content')
    <div class="container">
        <section>
            <div class="row">
                
            </div>
        </section>
        <section>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-3">
                        <div class="articlebox small">
                            @include('common.articlebox-grid')
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection