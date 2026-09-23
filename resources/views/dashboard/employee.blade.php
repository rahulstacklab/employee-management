@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')

    <div class="mb-4">

        <h1 class="mb-1">
            My Dashboard
        </h1>

        <p class="text-muted mb-0">
            Welcome, {{ auth()->user()->name }}
        </p>

    </div>


    @if($employee)

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card shadow-sm h-100">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            My Profile
                        </h5>

                        <p>
                            <strong>Name:</strong>
                            {{ $employee->user->name }}
                        </p>

                        <p>
                            <strong>Email:</strong>
                            {{ $employee->user->email }}
                        </p>

                        <p>
                            <strong>Employee Code:</strong>
                            {{ $employee->employee_code }}
                        </p>

                        <p>
                            <strong>Department:</strong>
                            {{ $employee->department->name }}
                        </p>

                        <p class="mb-0">
                            <strong>Designation:</strong>
                            {{ $employee->designation->name }}
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="card shadow-sm h-100">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Leave Summary
                        </h5>

                        <p>
                            <strong>Total Leave Requests:</strong>
                            {{ $employee->leaves->count() }}
                        </p>

                        <p>
                            <strong>Pending:</strong>
                            {{ $employee->leaves->where('status', 'pending')->count() }}
                        </p>

                        <p>
                            <strong>Approved:</strong>
                            {{ $employee->leaves->where('status', 'approved')->count() }}
                        </p>

                        <p class="mb-0">
                            <strong>Rejected:</strong>
                            {{ $employee->leaves->where('status', 'rejected')->count() }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="alert alert-warning">
            Employee profile not found.
        </div>

    @endif

@endsection