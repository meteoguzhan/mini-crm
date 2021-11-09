@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <a class="btn btn-primary float-right" href="{{route('employee.index')}}">Back</a>
        </div>
        <div class="col-md-12">
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1">New Employee</h4>
                @include('layout.includes.error')
                <form action="{{route('employee.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Company</label>
                        <select name="company_id" class="form-control" required>
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input name="first_name" class="form-control" placeholder="First Name" type="text">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input name="last_name" class="form-control" placeholder="Last Name" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-control" placeholder="Email" type="email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Save</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
@endsection
