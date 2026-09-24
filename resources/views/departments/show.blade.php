@extends('layouts.app')

@section('title', $department->name)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                {{ $department->name }}
            </h1>

            <p class="text-muted mb-0">
                Department details
            </p>
        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('departments.edit', $department) }}"
                class="btn btn-primary"
            >
                Edit
            </a>

            <a
                href="{{ route('departments.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>


    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <strong>
                        Department Name
                    </strong>

                    <div class="mt-1">
                        {{ $department->name }}
                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <strong>
                        Total Employees
                    </strong>

                    <div class="mt-1">
                        {{ $department->employees->count() }}
                    </div>

                </div>

                <div class="col-12">

                    <strong>
                        Description
                    </strong>

                    <div class="mt-1">
                        {{ $department->description ?? 'No description available.' }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">
            Employees in this Department
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>Employee Code</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($department->employees as $employee)

                            <tr>

                                <td>
                                    {{ $employee->employee_code }}
                                </td>

                                <td>
                                    {{ $employee->user->name }}
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
                                            {{ ucfirst($employee->status) }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="text-center text-muted py-4"
                                >
                                    No employees assigned to this department.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection