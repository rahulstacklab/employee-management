<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Details</title>
</head>

<body>

    <h1>Employee Details</h1>

    <p>
        <strong>Name:</strong>
        {{ $employee->user->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $employee->user->email }}
    </p>

    <p>
        <strong>Employee Code:</strong>
        {{ $employee->employee_code }}
    </p>

    <p>
        <strong>Department:</strong>
        {{ $employee->department->name }}
    </p>

    <p>
        <strong>Designation:</strong>
        {{ $employee->designation->name }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $employee->phone ?? 'N/A' }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $employee->address ?? 'N/A' }}
    </p>

    <p>
        <strong>Joining Date:</strong>
        {{ $employee->joining_date->format('d M Y') }}
    </p>

    <p>
        <strong>Salary:</strong>
        ₹{{ number_format($employee->salary, 2) }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ ucfirst($employee->status) }}
    </p>

    <br>

    <a href="{{ route('employees.index') }}">
        Back to Employees
    </a>

</body>

</html>