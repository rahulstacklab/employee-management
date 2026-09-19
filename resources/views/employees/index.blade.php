<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employees</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Employee Management</h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Employee Code</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($employees as $employee)

                <tr>
                    <td>{{ $employee->id }}</td>

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
                        ₹{{ $employee->salary }}
                    </td>

                    <td>
                        {{ $employee->status }}
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>