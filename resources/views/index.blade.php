@extends('layouts.index')
@section('title', 'home')
@section('content')
    <div class="container">
        <section>
            <div class="row">
                @foreach ($primaryArticles as $article)
                    @if($loop->iteration==1)
                        <div class="col-md-4">
                            @include('common.articlebox-primary')
                        </div>
                    @elseif($loop->iteration==2)
                        <div class="col-md-4">
                            @include('common.articlebox')
                    @elseif($loop->iteration==3)
                        @include('common.articlebox')
                        </div> <!-- end col-md-4 -->
                        <div class="col-md-4">
                            <div class="img-ad-v-container">
                                <img class='img-ad-v' src="{{ asset('images/ads/osde-vertical.gif') }}" />
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        
        <section>
            <div class="row">
                @foreach ($outstandingArticles as $article)
                    <div class="col-md-3">
                        @include('common.articlebox-small')
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <img class='img-ad' src="{{ asset('images/ads/18037334293457387892.gif') }}" />
        </section>

        <section>
            <h2>Suplemento negocios</h2>
            <div class="row">
                @foreach ($businessArticles as $article)
                    @switch($loop->iteration)
                        @case(1)
                            <div class="col-md-6">
                                @include('common.articlebox-medium')
                            </div>
                            @break
                        @case(2)
                            <div class="col-md-3">
                                @include('common.articlebox-small')
                            </div>
                            @break
                        @case(3)
                            <div class="col-md-3">
                                @include('common.articlebox-small')
                            </div>
                            @break    
                    @endswitch
                @endforeach
            </div>
        </section>
    </div>
    
@endsection