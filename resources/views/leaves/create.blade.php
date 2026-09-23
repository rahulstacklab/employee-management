@extends('layouts.app')

@section('title', 'Apply Leave')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            Apply Leave
        </h1>

        <a
            href="{{ route('leaves.index') }}"
            class="btn btn-secondary"
        >
            My Leaves
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('leaves.store') }}"
                method="POST"
            >

                @csrf


                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label">
                            Leave Type
                        </label>

                        <select
                            name="leave_type"
                            class="form-select @error('leave_type') is-invalid @enderror"
                        >

                            <option value="">
                                Select Leave Type
                            </option>

                            <option
                                value="casual"
                                {{ old('leave_type') === 'casual' ? 'selected' : '' }}
                            >
                                Casual Leave
                            </option>

                            <option
                                value="sick"
                                {{ old('leave_type') === 'sick' ? 'selected' : '' }}
                            >
                                Sick Leave
                            </option>

                            <option
                                value="earned"
                                {{ old('leave_type') === 'earned' ? 'selected' : '' }}
                            >
                                Earned Leave
                            </option>

                        </select>

                        @error('leave_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            Start Date
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            class="form-control @error('start_date') is-invalid @enderror"
                        >

                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label">
                            End Date
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ old('end_date') }}"
                            class="form-control @error('end_date') is-invalid @enderror"
                        >

                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Reason
                        </label>

                        <textarea
                            name="reason"
                            rows="4"
                            class="form-control @error('reason') is-invalid @enderror"
                            placeholder="Enter reason for leave..."
                        >{{ old('reason') }}</textarea>

                        @error('reason')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="col-12">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Submit Leave Request
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection