<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {

            $totalEmployees = Employee::count();

            $totalDepartments = Department::count();

            $totalDesignations = Designation::count();

            $pendingLeaves = Leave::where('status', 'pending')->count();

            $recentEmployees = Employee::with([
                'user',
                'department',
                'designation'
            ])
            ->latest()
            ->take(5)
            ->get();

            return view('dashboard.admin', compact(
                'totalEmployees',
                'totalDepartments',
                'totalDesignations',
                'pendingLeaves',
                'recentEmployees'
            ));
        }

        $employee = $user->employee()->with([
            'department',
            'designation',
            'leaves'
        ])->first();

        return view('dashboard.employee', compact('employee'));
    }
}