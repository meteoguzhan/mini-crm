@extends('layout.app')
@section('content')
    @include('layout.includes.navbar')
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <a class="btn btn-primary float-right" href="{{route('employee.create')}}">Create</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td>Actions</td>
                    <td>ID</td>
                    <td>Company</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Created At</td>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>
                            <form method="POST" action="{{route('employee.destroy', $employee->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
                                </div>
                            </form>
                        </td>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
