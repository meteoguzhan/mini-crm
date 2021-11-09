@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <a class="btn btn-primary float-right" href="{{route('company.index')}}">Back</a>
        </div>
        <div class="col-md-12">
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1">New Company</h4>
                @include('layout.includes.error')
                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" class="form-control" placeholder="Name" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-control" placeholder="Email" type="email">
                    </div>
                    <div class="form-group">
                        <label>Logo (Min 100x100)</label>
                        <input name="logo" class="form-control" type="file">
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input name="website" class="form-control" placeholder="Website" type="text">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Save</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
@endsection
