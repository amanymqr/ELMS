@extends('LEMS.employee.master')

@section('style')
    h1 {
    color: #53455c;
    }
    .card{
    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
    }
@endsection

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-3">Leave Requests Details</h1>

        @foreach ($leaveRequests as $leaveRequest)
            <div class="card mx-auto w-75 mb-4">
                <div class="card-body">
                    <h5 class="card-title">Leave Request {{ $leaveRequest->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $leaveRequest->leaveType->title }}</h6>
                    <p class="card-text">from {{ $leaveRequest->start_date }} to {{ $leaveRequest->end_date }}</p>

                    @if ($leaveRequest->status === 'pending')
                        <p class="card-text text-warning">Status: Pending - Waiting for Approval</p>
                        <a class="btn btn-sm text-primary" href="{{ route('leave-requests.edit', $leaveRequest->id) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form class="d-inline" action="{{ route('leave-requests.destroy', $leaveRequest->id) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm text-danger"
                                onclick="return confirm('Are you sure you want to delete this request?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    @elseif ($leaveRequest->status === 'approved')
                        <p class="card-text text-success">Status: Accepted - Enjoy your leave!</p>
                    @elseif ($leaveRequest->status === 'rejected')
                        <p class="card-text text-danger">Status: Rejected - Your leave request was not approved.</p>
                        <p class="card-text">Reason: {{ $leaveRequest->reason }}</p>
                    @endif
                </div>
            </div>
        @endforeach
        {{ $leaveRequests->links() }}

    </div>
@endsection
