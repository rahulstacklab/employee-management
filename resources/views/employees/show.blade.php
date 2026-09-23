@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <!-- <div class="text-muted small mb-1">
                Employee Management
            </div> -->

            <h1 class="fw-bold mb-1">
                Employee Details
            </h1>

            <p class="text-muted mb-0">
                View complete employee information
            </p>
        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('employees.index') }}"
                class="btn btn-outline-secondary"
            >
                Back
            </a>

            <a
                href="{{ route('employees.edit', $employee) }}"
                class="btn btn-primary"
            >
                Edit Employee
            </a>

        </div>

    </div>


    {{-- Main Card --}}
    <div class="card border-1 shadow-sm">

        {{-- Profile Header --}}
        <div class="card-body p-4 p-md-5 border-bottom">

            <div class="d-flex flex-column flex-md-row align-items-md-center gap-4">

                {{-- Avatar --}}
                <div
                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                    style="width: 80px; height: 80px; font-size: 28px;"
                >
                    {{ strtoupper(substr($employee->user->name ?? 'E', 0, 1)) }}
                </div>


                {{-- Employee Basic Info --}}
                <div class="flex-grow-1">

                    <div class="d-flex flex-column flex-md-row align-items-md-center gap-2">

                        <h2 class="fw-bold mb-0">
                            {{ $employee->user->name ?? 'N/A' }}
                        </h2>

                        @if($employee->status === 'active')

                            <span class="badge bg-success-subtle text-success px-3 py-2">
                                Active
                            </span>

                        @else

                            <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                Inactive
                            </span>

                        @endif

                    </div>

                    <p class="text-muted mb-1 mt-2">
                        {{ $employee->designation->name ?? 'N/A' }}
                    </p>

                    <span class="badge bg-light text-dark border">
                        {{ $employee->employee_code ?? 'N/A' }}
                    </span>

                </div>

            </div>

        </div>


        {{-- Employee Information --}}
        <div class="card-body p-4 p-md-5">

            <h5 class="fw-bold mb-4">
                Personal & Employment Information
            </h5>


            <div class="row g-4">


                {{-- Email --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Email Address
                        </div>

                        <div class="info-value">
                            {{ $employee->user->email ?? 'N/A' }}
                        </div>

                    </div>

                </div>


                {{-- Phone --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Phone Number
                        </div>

                        <div class="info-value">
                            {{ $employee->phone ?? 'N/A' }}
                        </div>

                    </div>

                </div>


                {{-- Department --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Department
                        </div>

                        <div class="info-value">
                            {{ $employee->department->name ?? 'N/A' }}
                        </div>

                    </div>

                </div>


                {{-- Designation --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Designation
                        </div>

                        <div class="info-value">
                            {{ $employee->designation->name ?? 'N/A' }}
                        </div>

                    </div>

                </div>


                {{-- Joining Date --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Joining Date
                        </div>

                        <div class="info-value">

                            @if($employee->joining_date)

                                {{ \Carbon\Carbon::parse($employee->joining_date)->format('d M Y') }}

                            @else

                                N/A

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Salary --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Salary
                        </div>

                        <div class="info-value">
                            ₹{{ number_format($employee->salary ?? 0, 2) }}
                        </div>

                    </div>

                </div>


                {{-- Address --}}
                <div class="col-12">

                    <div class="info-box">

                        <div class="info-label">
                            Address
                        </div>

                        <div class="info-value">
                            {{ $employee->address ?? 'N/A' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="card-footer bg-white border-top p-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                <div class="text-muted small">
                    Employee Code:
                    <strong class="text-dark">
                        {{ $employee->employee_code ?? 'N/A' }}
                    </strong>
                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('employees.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Back to Employees
                    </a>

                    <a
                        href="{{ route('employees.edit', $employee) }}"
                        class="btn btn-primary"
                    >
                        Edit Employee
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- Page Specific CSS --}}
<style>

    .info-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 18px 20px;
        height: 100%;
        transition: all 0.2s ease;
    }

    .info-box:hover {
        background: #ffffff;
        border-color: #dee2e6;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .info-label {
        color: #6c757d;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 7px;
    }

    .info-value {
        color: #212529;
        font-size: 16px;
        font-weight: 500;
        word-break: break-word;
    }

</style>

@endsection