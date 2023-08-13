@extends('LEMS.master')
@section('title', 'All Employees')
@section('content')

@include('LEMS.flash_action')
    <h3>All Employees</h3>
{{--
    <form action="{{ route('admin.customers.index') }}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="search by customer name .." name="search" >

            <button class="btn btn-dark px-4" id="button-addon2">Search</button>


        </div>
    </form>  --}}


<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>type</th>
            <th>created at</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{$employee->name }}</td>
            <td>{{$employee->email }}</td>
            <td>{{$employee->type }}</td>
            <td>{{ $employee->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}" class="btn text-info btn-sm">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>

                <a class="btn btn-sm text-primary" href="{{ route('employees.edit' ,$employee->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('employees.destroy' ,  $employee->id ) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm text-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $employees->links('pagination::bootstrap-5') }}
@stop
