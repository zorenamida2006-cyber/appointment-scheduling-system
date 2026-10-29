@extends('layouts.app')

@section('title', 'View Appointment')

@section('content')

<div class="page-header">

    <div>
        <h1>Appointment Details</h1>
        <p>View the complete information about this appointment.</p>
    </div>

    <div class="actions">

        <a
            href="{{ route('appointments.edit', $appointment) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('appointments.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>


<div class="card">

    <h2>Client Information</h2>

    <p>
        <strong>Name:</strong>

        {{ $appointment->client->first_name }}
        {{ $appointment->client->last_name }}
    </p>

    <p>
        <strong>Phone:</strong>

        {{ $appointment->client->phone }}
    </p>

    <p>
        <strong>Email:</strong>

        {{ $appointment->client->email }}
    </p>

</div>


<div class="card">

    <h2>Appointment Information</h2>

    <p>
        <strong>Service:</strong>

        {{ $appointment->service }}
    </p>

    <p>
        <strong>Date:</strong>

        {{ $appointment->appointment_date }}
    </p>

    <p>
        <strong>Start Time:</strong>

        {{ $appointment->start_time }}
    </p>

    <p>
        <strong>End Time:</strong>

        {{ $appointment->end_time }}
    </p>

    <p>
        <strong>Status:</strong>

        <span class="status status-{{ $appointment->status }}">
            {{ ucfirst($appointment->status) }}
        </span>

    </p>

</div>


<div class="card">

    <h2>Notes</h2>

    <p>
        {{ $appointment->notes ?: 'No notes available.' }}
    </p>

</div>

@endsection