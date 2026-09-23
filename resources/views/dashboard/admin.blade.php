@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">Admin Dashboard</h1>

            <p class="text-muted mb-0">
                Welcome, {{ auth()->user()->name }}
            </p>
        </div>

        <a
            href="{{ route('employees.create') }}"
            class="btn btn-primary"
        >
            + Add Employee
        </a>

    </div>


    {{-- Statistics --}}

    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Employees
                    </h6>

                    <h2 class="mb-0">
                        {{ $totalEmployees }}
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Departments
                    </h6>

                    <h2 class="mb-0">
                        {{ $totalDepartments }}
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Designations
                    </h6>

                    <h2 class="mb-0">
                        {{ $totalDesignations }}
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Pending Leaves
                    </h6>

                    <h2 class="mb-0">
                        {{ $pendingLeaves }}
                    </h2>

                </div>

            </div>

        </div>

    </div>


    {{-- Recent Employees --}}

    <div class="card shadow-sm">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Recent Employees
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Employee Code</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($recentEmployees as $employee)

                            <tr>

                                <td>
                                    {{ $employee->user->name }}
                                </td>

                                <td>
                                    {{ $employee->employee_code }}
                                </td>

                                <td>
                                    {{ $employee->department->name }}
                                </td>

                                <td>
                                    {{ $employee->designation->name }}
                                </td>

                                <td>

                                    @if($employee->status === 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center text-muted"
                                >
                                    No employees found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection