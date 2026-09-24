@extends('layouts.app')

@section('title', 'Leave Management')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-1">
                Leave Management
            </h1>

            <p class="text-muted mb-0">
                Manage employee leave requests
            </p>
        </div>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Department</th>
                            <th>Leave Type</th>
                            <th>Dates</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th width="220">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leaves as $leave)

                            <tr>

                                <td>
                                    {{ $leave->id }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $leave->employee->user->name }}
                                    </strong>

                                    <br>

                                    <small class="text-muted">
                                        {{ $leave->employee->employee_code }}
                                    </small>

                                </td>

                                <td>
                                    {{ $leave->employee->department->name }}
                                </td>

                                <td>
                                    {{ ucfirst($leave->leave_type) }}
                                </td>

                                <td>

                                    {{ $leave->start_date->format('d M Y') }}

                                    <br>

                                    <small class="text-muted">
                                        to
                                        {{ $leave->end_date->format('d M Y') }}
                                    </small>

                                </td>

                                <td>
                                    {{ $leave->reason ?? '-' }}
                                </td>

                                <td>

                                    @if($leave->status === 'approved')

                                        <span class="badge bg-success">
                                            Approved
                                        </span>

                                    @elseif($leave->status === 'rejected')

                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($leave->status === 'pending')

                                        <form
                                            action="{{ route('admin.leaves.update-status', $leave) }}"
                                            method="POST"
                                            class="mb-2"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="status"
                                                value="approved"
                                            >

                                            <input
                                                type="text"
                                                name="admin_remark"
                                                class="form-control form-control-sm mb-2"
                                                placeholder="Optional remark"
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-success"
                                            >
                                                Approve
                                            </button>

                                        </form>


                                        <form
                                            action="{{ route('admin.leaves.update-status', $leave) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="status"
                                                value="rejected"
                                            >

                                            <input
                                                type="text"
                                                name="admin_remark"
                                                class="form-control form-control-sm mb-2"
                                                placeholder="Reason for rejection"
                                                required
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Reject
                                            </button>

                                        </form>

                                    @else

                                        <small class="text-muted">
                                            Action completed
                                        </small>

                                        @if($leave->admin_remark)

                                            <div class="mt-1">
                                                <small>
                                                    {{ $leave->admin_remark }}
                                                </small>
                                            </div>

                                        @endif

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center text-muted py-4"
                                >
                                    No leave requests found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <div class="mt-3">

                {{ $leaves->links() }}

            </div>

        </div>

    </div>

@endsection