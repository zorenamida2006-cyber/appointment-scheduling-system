@extends('layouts.app')
@section('title', 'Appointments')

@section('content')

<div class="page-header">

    <div>
        <h1>Appointments</h1>
        <p>Manage scheduled appointments and client bookings.</p>
    </div>

    <a href="{{ route('appointments.create') }}" class="btn btn-primary">
        + Create Appointment
    </a>

</div>


<table>

    <thead>

        <tr>
            <th>Client</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

    </thead>


    <tbody>

        @forelse($appointments as $appointment)

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

            <td>

                <div class="actions">
                

                    <a
                        href="{{ route('appointments.show', $appointment) }}"
                        class="btn btn-secondary"
                    >
                        View
                    </a>

                    <a
                        href="{{ route('appointments.edit', $appointment) }}"
                        class="btn btn-primary"
                    >
                        Edit
                    </a>

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6">
                No appointments found.
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection

