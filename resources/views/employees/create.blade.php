<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
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
            border: 1px solid #ccc;
            border-radius: 5px;
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
            border-radius: 5px;
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

    <h1>Add Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Password</label>

            <input
                type="password"
                name="password"
            >

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Department</label>

            <select name="department_id">

                <option value="">Select Department</option>

                @foreach($departments as $department)

                    <option
                        value="{{ $department->id }}"
                        {{ old('department_id') == $department->id ? 'selected' : '' }}
                    >
                        {{ $department->name }}
                    </option>

                @endforeach

            </select>

            @error('department_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Designation</label>

            <select name="designation_id">

                <option value="">Select Designation</option>

                @foreach($designations as $designation)

                    <option
                        value="{{ $designation->id }}"
                        {{ old('designation_id') == $designation->id ? 'selected' : '' }}
                    >
                        {{ $designation->name }}
                    </option>

                @endforeach

            </select>

            @error('designation_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Phone</label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
            >

            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Address</label>

            <textarea name="address">{{ old('address') }}</textarea>

            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Joining Date</label>

            <input
                type="date"
                name="joining_date"
                value="{{ old('joining_date') }}"
            >

            @error('joining_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Salary</label>

            <input
                type="number"
                step="0.01"
                name="salary"
                value="{{ old('salary') }}"
            >

            @error('salary')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Status</label>

            <select name="status">

                <option value="active"
                    {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="inactive"
                    {{ old('status') == 'inactive' ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit">
            Create Employee
        </button>

    </form>

</div>

</body>
</html>