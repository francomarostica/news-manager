@extends('layouts.index')
@section('title', 'home')
@section('content')
    <div class="container">
        <section>
            
            @foreach ($articles as $article)
                @if($loop->iteration==1)
                    <div class="row">
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
                    </div> <!-- end row -->
                @elseif($loop->iteration==4)
                    <section>
                        <div class="row">
                            <div class="col-md-3">
                                @include('common.articlebox-small')
                            </div>
                @elseif($loop->iteration>4 && $loop->iteration<7)
                   <div class="col-md-3">
                        @include('common.articlebox-small')
                    </div>
                @elseif($loop->iteration==7)
                            <div class="col-md-3">
                                @include('common.articlebox-small')
                            </div>
                        </div>
                    </section>
                @endif
            @endforeach
        </section>
        
        <section>
            <img class='img-ad' src="{{ asset('images/ads/18037334293457387892.gif') }}" />
        </section>
    </div>
    
@endsection