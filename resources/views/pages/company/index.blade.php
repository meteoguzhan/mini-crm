@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <a class="btn btn-primary float-right" href="{{route('company.create')}}">Create</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td>Actions</td>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Logo</td>
                    <td>Website</td>
                    <td>Created At</td>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>
                            <form method="POST" action="{{route('company.destroy', $company->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
                                </div>
                            </form>
                        </td>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td><img style="max-width: 200px" src="{{ asset('storage/logos/'.$company->logo) }}"/></td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
