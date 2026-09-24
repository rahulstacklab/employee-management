@extends('layouts.app')

@section('title', 'Edit Designation')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Edit Designation
            </h1>

            <p class="text-muted mb-0">
                Update designation information
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
                action="{{ route('designations.update', $designation) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


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
                        value="{{ old('name', $designation->name) }}"
                        class="form-control @error('name') is-invalid @enderror"
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
                    >{{ old('description', $designation->description) }}</textarea>

                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Designation
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