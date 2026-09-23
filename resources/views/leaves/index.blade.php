@extends('layouts.app')

@section('title', 'My Leaves')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            My Leaves
        </h1>

        <a
            href="{{ route('leaves.create') }}"
            class="btn btn-primary"
        >
            + Apply Leave
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Admin Remark</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leaves as $leave)

                            <tr>

                                <td>
                                    {{ $leave->id }}
                                </td>

                                <td>
                                    {{ ucfirst($leave->leave_type) }}
                                </td>

                                <td>
                                    {{ $leave->start_date->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $leave->end_date->format('d M Y') }}
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

                                    @elseif($leave->status === 'cancelled')

                                        <span class="badge bg-secondary">
                                            Cancelled
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $leave->admin_remark ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center text-muted"
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