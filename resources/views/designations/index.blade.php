@extends('layouts.app')

@section('title', 'Designations')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Designations
            </h1>

            <p class="text-muted mb-0">
                Manage employee designations
            </p>
        </div>

        <a
            href="{{ route('designations.create') }}"
            class="btn btn-primary"
        >
            + Add Designation
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

                            <th width="220">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($designations as $designation)

                            <tr>

                                <td>
                                    {{ $designation->id }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $designation->name }}
                                    </strong>

                                </td>

                                <td>
                                    {{ $designation->description ?? '-' }}
                                </td>

                                <td>

                                    <span class="badge bg-primary">

                                        {{ $designation->employees_count }}

                                    </span>

                                </td>

                                <td>

                                    <a
                                        href="{{ route('designations.show', $designation) }}"
                                        class="btn btn-sm btn-outline-info"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('designations.edit', $designation) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('designations.destroy', $designation) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this designation?')"
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
                                    No designations found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}

            <div class="mt-3">

                {{ $designations->links() }}

            </div>

        </div>

    </div>

@endsection