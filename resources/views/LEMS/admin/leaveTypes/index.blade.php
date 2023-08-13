@extends('LEMS.master')
@section('title', 'leave Types')

@section('content')
    <h1 class=" mb-3">Leave Types</h1>
    {{--  <a href="{{ route('leave-types.create') }}" class="btn btn-primary mb-3">Add New Leave Type</a>  --}}
    @include('LEMS.flash_action')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leave_types as $leaveType)
                <tr>
                    <td>{{ $leaveType->id }}</td>
                    <td>{{ $leaveType->title }}</td>
                    <td>{{ $leaveType->description }}</td>
                    <td>{{ $leaveType->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>

                        <a href="{{ route('leave-types.edit', $leaveType->id) }}" class="btn text-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('leave-types.destroy', $leaveType->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger btn-sm" onclick="return confirm('Are you sure you want to delete this leave type?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{--  {{ $leave_types->links() }}  --}}
@endsection
