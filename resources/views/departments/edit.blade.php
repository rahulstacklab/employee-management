@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            Edit Department
        </h1>

        <a
            href="{{ route('departments.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('departments.update', $department) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Department Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $department->name) }}"
                        class="form-control @error('name') is-invalid @enderror"
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                    >{{ old('description', $department->description) }}</textarea>

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
                    Update Department
                </button>

            </form>

        </div>

    </div>

@endsection