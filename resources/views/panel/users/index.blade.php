@extends('layouts.panel')
@section('commands-menu')
    <a class="btn btn-primary" href="/panel/users/create">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
        </svg>
    </a>
@endsection
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