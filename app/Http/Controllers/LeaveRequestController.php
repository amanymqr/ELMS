<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $leaveRequests = LeaveRequest::with('leaveType')
            ->where('user_id', $user_id)
            ->orderByDesc('id')
            ->paginate(3);

        return view('LEMS.employee.index', compact('leaveRequests'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $leaveTypes = LeaveType::all();
        $leaveRequests = LeaveRequest::with('leaveType')
            ->where('user_id', $user_id)
            ->orderByDesc('id')
            ->get();
        return view('LEMS.employee.create', compact('leaveRequests', 'leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',

        ]);

        LeaveRequest::create([
            'user_id' => $user_id,
            'leave_type_id' => $request->input('leave_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Submitted Successfully')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id = auth()->user()->id;
        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);
        $leaveTypes = LeaveType::all();
        return view('LEMS.employee.edit', compact('leaveRequest', 'leaveTypes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            // 'reason' => 'required|string',
        ]);

        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);

        $leaveRequest->update([
            'leave_type_id' => $request->input('leave_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            // 'reason' => $request->input('reason'),
        ]);

        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Updated Successfully')
            ->with('type', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = auth()->user()->id;
        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);
        $leaveRequest->delete();
        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Deleted Successfully')
            ->with('type', 'success');
    }
}
