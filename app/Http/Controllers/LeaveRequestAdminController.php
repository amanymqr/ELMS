<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestAdminController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::with('user', 'leaveType')->orderBy('id', 'DESC')->paginate(10);
        return view('LEMS.admin.leaveRequests.index', compact('leaveRequests'));
    }


    public function approve($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('LEMS.admin.leaveRequests..approve', compact('leaveRequest'));
    }

    public function deny($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('LEMS.admin.leaveRequests.deny', compact('leaveRequest'));
    }

    public function storeApproval($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update(['status' => 'approved']);
        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request approved.');
    }

    public function storeDenial(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update([
            'status' => 'rejected',
            'reason' => $request->input('reason'),
        ]);

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request denied.');
    }
}
