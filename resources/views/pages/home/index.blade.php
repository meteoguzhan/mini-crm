@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <h2 class="mt-4">
        @if (auth()->guest())
            Hi, Guest
        @else
            @if (auth()->user()->is_admin)
                Hi, Admin
            @else
                Hi, User
            @endif
        @endif
    </h2>
@endsection
