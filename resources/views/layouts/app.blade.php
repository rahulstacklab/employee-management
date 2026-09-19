<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Employee Management')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">

            <a
                class="navbar-brand"
                href="{{ route('employees.index') }}"
            >
                Employee Management
            </a>

            <a
                href="{{ route('employees.create') }}"
                class="btn btn-light"
            >
                Add Employee
            </a>

        </div>
    </nav>


    {{-- Main Content --}}
    <main class="container py-4">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- Error Message --}}
        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif


        @yield('content')

    </main>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>