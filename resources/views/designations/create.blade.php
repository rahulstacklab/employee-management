@extends('layouts.app')

@section('title', 'Add Designation')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Add Designation
            </h1>

            <p class="text-muted mb-0">
                Create a new employee designation
            </p>
        </div>

        <a
            href="{{ route('designations.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('designations.store') }}"
                method="POST"
            >

                @csrf

                {{-- Designation Name --}}

                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Designation Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="e.g. Senior Developer"
                    >

                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Description --}}

                <div class="mb-3">

                    <label
                        for="description"
                        class="form-label"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter designation description"
                    >{{ old('description') }}</textarea>

                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Submit --}}

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Create Designation
                </button>

                <a
                    href="{{ route('designations.index') }}"
                    class="btn btn-light"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

@endsection