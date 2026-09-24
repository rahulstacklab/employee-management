@extends('layouts.app')

@section('title', 'Departments')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Departments
            </h1>

            <p class="text-muted mb-0">
                Manage company departments
            </p>
        </div>

        <a
            href="{{ route('departments.create') }}"
            class="btn btn-primary"
        >
            + Add Department
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Employees</th>
                            <th width="180">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($departments as $department)

                            <tr>

                                <td>
                                    {{ $department->id }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $department->name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $department->description ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $department->employees_count }}
                                    </span>
                                </td>

                                <td>

                                    <a
                                        href="{{ route('departments.show', $department) }}"
                                        class="btn btn-sm btn-outline-info"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('departments.edit', $department) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('departments.destroy', $department) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this department?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center text-muted py-4"
                                >
                                    No departments found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $departments->links() }}
            </div>

        </div>

    </div>

@endsection