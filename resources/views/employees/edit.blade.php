<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Employee</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            padding: 12px 20px;
            background: #222;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Employee</h1>

    <form
        action="{{ route('employees.update', $employee) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        {{-- Name --}}
        <div class="form-group">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $employee->user->name) }}"
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Email --}}
        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $employee->user->email) }}"
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Department --}}
        <div class="form-group">

            <label>Department</label>

            <select name="department_id">

                <option value="">Select Department</option>

                @foreach($departments as $department)

                    <option
                        value="{{ $department->id }}"
                        {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}
                    >
                        {{ $department->name }}
                    </option>

                @endforeach

            </select>

            @error('department_id')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Designation --}}
        <div class="form-group">

            <label>Designation</label>

            <select name="designation_id">

                <option value="">Select Designation</option>

                @foreach($designations as $designation)

                    <option
                        value="{{ $designation->id }}"
                        {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}
                    >
                        {{ $designation->name }}
                    </option>

                @endforeach

            </select>

            @error('designation_id')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Phone --}}
        <div class="form-group">

            <label>Phone</label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone', $employee->phone) }}"
            >

            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Address --}}
        <div class="form-group">

            <label>Address</label>

            <textarea name="address">{{ old('address', $employee->address) }}</textarea>

            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Joining Date --}}
        <div class="form-group">

            <label>Joining Date</label>

            <input
                type="date"
                name="joining_date"
                value="{{ old('joining_date', $employee->joining_date->format('Y-m-d')) }}"
            >

            @error('joining_date')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Salary --}}
        <div class="form-group">

            <label>Salary</label>

            <input
                type="number"
                step="0.01"
                name="salary"
                value="{{ old('salary', $employee->salary) }}"
            >

            @error('salary')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        {{-- Status --}}
        <div class="form-group">

            <label>Status</label>

            <select name="status">

                <option
                    value="active"
                    {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}
                >
                    Active
                </option>

                <option
                    value="inactive"
                    {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}
                >
                    Inactive
                </option>

            </select>

            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <button type="submit">
            Update Employee
        </button>

    </form>

    <br>

    <a href="{{ route('employees.index') }}">
        Back to Employees
    </a>

</div>

</body>

</html>