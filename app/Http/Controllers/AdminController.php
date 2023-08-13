<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalEmployees = User::count();
        $totalLeaveTypes = LeaveType::count();
        $totalLeaveRequestsAppend = LeaveRequest::pending()->count();
        $totalLeaveRequestsAccepted = LeaveRequest::approved()->count();
        $totalLeaveRequestsRejected = LeaveRequest::rejected()->count();

        return view('LEMS.admin.index', compact(
            'totalEmployees',
            'totalLeaveTypes',
            'totalLeaveRequestsAppend',
            'totalLeaveRequestsAccepted',
            'totalLeaveRequestsRejected'
        ));
    }
}
