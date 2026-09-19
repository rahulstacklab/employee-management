@extends('layouts.app')

@section('title', 'Employees')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            Employees
        </h1>

        <a
            href="{{ route('employees.create') }}"
            class="btn btn-primary"
        >
            + Add Employee
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Employee Code</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th width="180">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($employees as $employee)

                            <tr>

                                <td>
                                    {{ $employee->id }}
                                </td>

                                <td>
                                    {{ $employee->user->name }}
                                </td>

                                <td>
                                    {{ $employee->user->email }}
                                </td>

                                <td>
                                    {{ $employee->employee_code }}
                                </td>

                                <td>
                                    {{ $employee->department->name }}
                                </td>

                                <td>
                                    {{ $employee->designation->name }}
                                </td>

                                <td>
                                    ₹{{ number_format($employee->salary, 2) }}
                                </td>

                                <td>

                                    @if($employee->status === 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route('employees.show', $employee) }}"
                                        class="btn btn-sm btn-info"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('employees.edit', $employee) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('employees.destroy', $employee) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this employee?')"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center"
                                >
                                    No employees found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection