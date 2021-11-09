@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <article class="card-body">
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        @include('layout.includes.error')
        <form action="{{route('auth.login')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Your email</label>
                <input name="email" class="form-control" placeholder="Email" type="email">
            </div> <!-- form-group// -->
            <div class="form-group">
                <label>Your password</label>
                <input name="password" class="form-control" placeholder="******" type="password">
            </div> <!-- form-group// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Login</button>
            </div> <!-- form-group// -->
        </form>
    </article>
@endsection
