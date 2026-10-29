@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="page-header">

    <div>
        <h1>Dashboard</h1>
        <p>Overview of your appointment system.</p> <hr>
    </div>

</div>


<!-- Summary -->

<div class="dashboard-summary">

    <div>
        <span>Total Clients</span>
        <strong>{{ $totalClients }}</strong>
    </div>

    <div>
        <span>Total Appointments</span>
        <strong>{{ $totalAppointments }}</strong>
    </div>

</div>


<!-- Appointment Status -->

<h2 class="dashboard-title">
    Appointment Status
</h2>


<div class="dashboard-stats">

    <!-- Pending -->

    <div class="stat-card">

        <div class="stat-title">
            Pending
        </div>

        <div class="stat-number">
            {{ $pendingAppointments }}
        </div>

        <span class="status status-pending">
            Pending
        </span>

    </div>


    <!-- Confirmed -->

    <div class="stat-card">

        <div class="stat-title">
            Confirmed
        </div>

        <div class="stat-number">
            {{ $confirmedAppointments }}
        </div>

        <span class="status status-confirmed">
            Confirmed
        </span>

    </div>


    <!-- Completed -->

    <div class="stat-card">

        <div class="stat-title">
            Completed
        </div>

        <div class="stat-number">
            {{ $completedAppointments }}
        </div>

        <span class="status status-completed">
            Completed
        </span>

    </div>


    <!-- Cancelled -->

    <div class="stat-card">

        <div class="stat-title">
            Cancelled
        </div>

        <div class="stat-number">
            {{ $cancelledAppointments }}
        </div>

        <span class="status status-cancelled">
            Cancelled
        </span>

    </div>

</div>


<!-- Recent Appointments -->

<div class="dashboard-section">

    <div class="section-header">

        <div>
            <h2>Recent Appointments</h2>
            <p>Latest appointments in the system.</p>
        </div>

        <a
            href="{{ route('appointments.index') }}"
            class="btn btn-secondary"
        >
            View All
        </a>

    </div>


    @if($recentAppointments->count() > 0)

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($recentAppointments as $appointment)

                        <tr>

                            <td>
                                <strong>
                                    {{ $appointment->client->first_name }}
                                    {{ $appointment->client->last_name }}
                                </strong>
                            </td>

                            <td>
                                {{ $appointment->service }}
                            </td>

                            <td>
                                {{ $appointment->appointment_date }}
                            </td>

                            <td>
                                {{ $appointment->start_time }}
                                -
                                {{ $appointment->end_time }}
                            </td>

                            <td>

                                <span class="status status-{{ $appointment->status }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-state">

            <h3>No appointments yet</h3>

            <p>
                There are currently no appointments in the system.
            </p>

            <a
                href="{{ route('appointments.create') }}"
                class="btn btn-primary"
            >
                + Create Appointment
            </a>

        </div>

    @endif

</div>


<!-- Quick Actions -->

<div class="dashboard-section">

    <div class="section-header">

        <div>
            <h2>Quick Actions</h2>
            <p>Quickly access common tasks.</p>
        </div>

    </div>


    <div class="quick-actions">

        <a
            href="{{ route('appointments.create') }}"
            class="btn btn-primary"
        >
            + New Appointment
        </a>

        <a
            href="{{ route('clients.create') }}"
            class="btn btn-secondary"
        >
            + Add Client
        </a>

    </div>

</div>

@endsection