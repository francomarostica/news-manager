@extends('layouts.panel')
@section('content')
    <h1>{{ __('users.title') }}</h1>
    @foreach ($users as $user)
        <div class="article-list row">
            <div class="col-md-6">
                {{ $user->name }}
            </div>
        </div>
    @endforeach
@endsection