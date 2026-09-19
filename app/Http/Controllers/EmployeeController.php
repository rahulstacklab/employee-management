<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with([
            'user',
            'department',
            'designation'
        ])->latest()->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
    
        return view('employees.create', compact(
            'departments',
            'designations'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
    
            'email' => 'required|email|unique:users,email',
    
            'password' => 'required|string|min:8',
    
            'department_id' => 'required|exists:departments,id',
    
            'designation_id' => 'required|exists:designations,id',
    
            'phone' => 'nullable|string|max:20',
    
            'address' => 'nullable|string',
    
            'joining_date' => 'required|date',
    
            'salary' => 'nullable|numeric|min:0',
    
            'status' => 'required|in:active,inactive',
        ]);
    
        DB::transaction(function () use ($validated) {
    
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'employee',
            ]);
    
            Employee::create([
                'user_id' => $user->id,
                'department_id' => $validated['department_id'],
                'designation_id' => $validated['designation_id'],
                'employee_code' => 'EMP' . strtoupper(
                    substr(uniqid(), -5)
                ),
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
                'joining_date' => $validated['joining_date'],
                'salary' => $validated['salary'] ?? null,
                'status' => $validated['status'],
            ]);
        });
    
        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load([
            'user',
            'department',
            'designation',
            'leaves'
        ]);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
