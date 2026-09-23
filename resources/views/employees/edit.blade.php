@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')

<div class="container py-4">

    {{-- Page Heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Edit Employee
            </h1>

            <p class="text-muted mb-0">
                Update employee information
            </p>
        </div>

        <a
            href="{{ route('employees.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>


    {{-- Employee Card --}}
    <div class="card shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('employees.update', $employee) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="row">


                    {{-- Name --}}
                    <div class="col-md-6 mb-3">

                        <label for="name" class="form-label">
                            Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $employee->user->name) }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter employee name"
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="col-md-6 mb-3">

                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $employee->user->email) }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter email"
                        >

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Department --}}
                    <div class="col-md-6 mb-3">

                        <label for="department_id" class="form-label">
                            Department
                        </label>

                        <select
                            id="department_id"
                            name="department_id"
                            class="form-select @error('department_id') is-invalid @enderror"
                        >

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('department_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Designation --}}
                    <div class="col-md-6 mb-3">

                        <label for="designation_id" class="form-label">
                            Designation
                        </label>

                        <select
                            id="designation_id"
                            name="designation_id"
                            class="form-select @error('designation_id') is-invalid @enderror"
                        >

                            <option value="">
                                Select Designation
                            </option>

                            @foreach($designations as $designation)

                                <option
                                    value="{{ $designation->id }}"
                                    {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}
                                >
                                    {{ $designation->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('designation_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">

                        <label for="phone" class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="{{ old('phone', $employee->phone) }}"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Enter phone number"
                        >

                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Joining Date --}}
                    <div class="col-md-6 mb-3">

                        <label for="joining_date" class="form-label">
                            Joining Date
                        </label>

                        <input
                            type="date"
                            id="joining_date"
                            name="joining_date"
                            value="{{ old('joining_date', optional($employee->joining_date)->format('Y-m-d')) }}"
                            class="form-control @error('joining_date') is-invalid @enderror"
                        >

                        @error('joining_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Salary --}}
                    <div class="col-md-6 mb-3">

                        <label for="salary" class="form-label">
                            Salary
                        </label>

                        <input
                            type="number"
                            id="salary"
                            name="salary"
                            value="{{ old('salary', $employee->salary) }}"
                            step="0.01"
                            min="0"
                            class="form-control @error('salary') is-invalid @enderror"
                            placeholder="Enter salary"
                        >

                        @error('salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label for="status" class="form-label">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >

                            <option
                                value="active"
                                {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Address --}}
                    <div class="col-12 mb-3">

                        <label for="address" class="form-label">
                            Address
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Enter employee address"
                        >{{ old('address', $employee->address) }}</textarea>

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- Buttons --}}
                <div class="mt-3">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Employee
                    </button>

                    <a
                        href="{{ route('employees.index') }}"
                        class="btn btn-outline-secondary ms-2"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection