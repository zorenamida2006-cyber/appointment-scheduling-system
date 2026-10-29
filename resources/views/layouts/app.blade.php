<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Appointment System')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<nav>

    <h1 id="appointsys">
        appointment Scheduling System
    </h1>

    <div class="nav-links">

        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('appointments.index') }}"
            class="{{ request()->routeIs('appointments.*') ? 'active' : '' }}">
            Appointments
        </a>

        <a href="{{ route('appointments.create') }}"
            class="{{ request()->routeIs('appointments.create') ? 'active' : '' }}">
            New Appointment
        </a>

        <a href="{{ route('clients.index') }}"
            class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">
            Clients
        </a>

        <a href="{{ route('clients.create') }}"
            class="{{ request()->routeIs('clients.create') ? 'active' : '' }}">
            + Add Client
        </a>

    </div>

</nav>
<div class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div> 
<footer class="footer">
    <div class="footer-container">
        <p>&copy; 2026 Appointment Scheduling and Client Records System</p>
        <p>All Rights Reserved.</p> <br>
        
        
        
        
    </div>
</footer>

</body>
</html>