<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Employee Management')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">

        <div class="container">

            <a
                class="navbar-brand"
                href="{{ route('dashboard') }}"
            >
                Employee Management
            </a>

            <div class="d-flex align-items-center gap-2">

                @auth

                    <span class="text-white">
                        {{ auth()->user()->name }}
                    </span>

                    @if(auth()->user()->role === 'admin')

                        <a
                            href="{{ route('employees.index') }}"
                            class="btn btn-outline-light btn-sm"
                        >
                            Employees
                        </a>

                    @endif

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-inline"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="btn btn-light btn-sm"
                        >
                            Logout
                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </nav>


    <main class="container py-4">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif


        @yield('content')

    </main>

</body>

</html>