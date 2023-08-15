<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->search) {
            $employees = User::searchByName(request()->search)
                ->orderByDesc('id')
                ->paginate(8);
        } else {
            $employees = User::orderByDesc('id')
                ->paginate(8);
        }
        // $employees = User::orderByDesc('id')->paginate(8);
        return view('LEMS.admin.employee.index', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('LEMS.admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employees.index')
            ->with('msg', 'Employee Created Successfully')
            ->with('type', 'success');
    }


    public function show(string $id): View
    {
        $employees = User::findOrFail($id);
        return view('LEMS.admin.employee.show', compact('employees'));
    }




    public function edit(string $id)
    {
        $employees = User::findOrFail($id);
        return view('LEMS.admin.employee.edit', compact('employees'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        $employee = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $employee->update($data);

        return redirect()->route('employees.index')
            ->with('msg', 'Employee Updated Successfully')
            ->with('type', 'success');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = User::findOrFail($id);
        $employees->destroy($id);
        return redirect()->route('employees.index')
            ->with('msg', 'Employee Deleted Successfully')
            ->with('type', 'danger');
    }
}
