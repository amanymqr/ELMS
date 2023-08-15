@extends('LEMS.master')
@section('title', 'All Employees')

@section('search')
    <!-- Topbar Search -->
    <form action="{{ route('employees.index') }}" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for Employee..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
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
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->type }}</td>
                    <td>{{ $employee->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn text-info btn-sm">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>

                        <a class="btn btn-sm text-primary" href="{{ route('employees.edit', $employee->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" id="deleteForm" action="{{ route('employees.destroy', $employee->id) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm text-danger" onclick="return confirm('Are you sure')"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links('pagination::bootstrap-5') }}
    {{--
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('deleteForm').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form when confirmed
                        document.getElementById('deleteForm').submit();
                    }
                });
            });
        });
    </script>
@endsection  --}}
@stop
