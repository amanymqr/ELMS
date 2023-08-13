@extends('LEMS.master')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Counts</h1>

    <div class="row">
        <div class="col-xl-4 col-md-6 text-center">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-user mx-1 mb-2"></i>
                    <span> Employee Count: <strong>{{ $totalEmployees }}</strong></span>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 text-center">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-user mx-1 mb-2"></i>
                    <span> Leave Type Count: <strong>{{ $totalLeaveTypes }}</strong></span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 text-center">


            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-stopwatch mx-1 mb-2"></i>
                    <span> Pending Leave Requests: <strong>{{ $totalLeaveRequestsAppend }}</strong></span>
                </div>
            </div>


        </div>


    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 text-center">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <i class="fa-solid fa-check-double mx-1 mb-2"></i>
                    <span> Accepted Leave Requests: <strong>{{ $totalLeaveRequestsAccepted }}</strong></span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 text-center">

            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <i class="fa-solid fa-xmark mx-1 mb-2"></i>
                    <span> Rejected Leave Requests: <strong>{{ $totalLeaveRequestsRejected }}</strong></span>
                </div>
            </div>
        </div>
    </div>
@endsection
