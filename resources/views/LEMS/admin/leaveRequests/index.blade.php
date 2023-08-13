@extends('LEMS.master')
@section('title', 'Leave Requests')

@section('content')
    <h1>Leave Requests</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveRequests as $leaveRequest)
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->user->name }}</td>
                    <td>{{ $leaveRequest->leaveType->title }}</td>
                    <td>{{ $leaveRequest->start_date }}</td>
                    <td>{{ $leaveRequest->end_date }}</td>
                    <td>{{ ucfirst($leaveRequest->status) }}</td>
                    <td>
                        @if ($leaveRequest->status === 'pending')
                            <a href="{{ route('leave-requests.approve', $leaveRequest->id) }}"
                                class="btn btn-sm  btn-success">Approve</a>
                            <a href="{{ route('leave-requests.deny', $leaveRequest->id) }}"
                                class="btn  btn-sm btn-danger">rejected</a>
                        @elseif ($leaveRequest->status === 'approved' || $leaveRequest->status === 'rejected')
                            Answered
                        @endif
                    </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endsection
