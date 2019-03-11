@extends('layouts.index')
@section('title', 'home')
@section('content')
    <div class="container">
        <section>
            @foreach ($articles as $article)
                @if($loop->iteration==1)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="articlebox primary">
                                <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
                                <div class="titlebox">
                                    <div class="category">{{ $article->category_id }}</div>
                                    <h1 class="title">{{ $article->title }}</h1>
                                </div>
                            </div>
                        </div>
                @elseif($loop->iteration==2)
                        <div class="col-md-4">
                            <div class="img-ad-v-container">
                                <img class='img-ad-v' src="{{ asset('images/ads/agrovoz-v.gif') }}" />
                            </div>
                        </div>
                    </div> <!-- end row -->
                    
                @elseif($loop->iteration==3)
                    
                @endif
            @endforeach
        </section>
        
        <section>
            <img class='img-ad' src="{{ asset('images/ads/18037334293457387892.gif') }}" />
        </section>
    </div>
    
@endsection