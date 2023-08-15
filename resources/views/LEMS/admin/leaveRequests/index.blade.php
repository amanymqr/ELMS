<?php
function getStatusColor($status)
{
    switch ($status) {
        case 'approved':
            return 'green';
        case 'rejected':
            return 'red';
        default:
            return 'orange';
    }
}
?>

@extends('LEMS.master')
@section('title', 'Leave Requests')

@section('content')
    <h3 class="text-center my-4  fw-4"> Employee Leave Requests</h3>
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
                    <td style="color: {{ getStatusColor($leaveRequest->status) }}">{{ ucFirst($leaveRequest->status) }}</td>
                    <td>
                        @if ($leaveRequest->status === 'pending')
                            <div class="d-flex">
                                <form action="{{ route('leave-requests.approve.store', $leaveRequest->id) }}" method="POST" class="mx-1">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success"><i
                                            class="fa-solid fa-check-double"></i></button>
                                </form>
                                <a href="{{ route('leave-requests.deny', $leaveRequest->id) }}"
                                    class="btn  btn-sm btn-outline-danger"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                        @elseif ($leaveRequest->status === 'approved' || $leaveRequest->status === 'rejected')
                            Answered
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $leaveRequests->links() }}
@endsection
