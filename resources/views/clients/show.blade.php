@extends('layouts.app')

@section('title', 'Client Profile')

@section('content')

<h1>
    {{ $client->first_name }}
    {{ $client->last_name }}
</h1>

<div class="card">

    <p>
        <strong>Phone:</strong>
        {{ $client->phone }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $client->email }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $client->address }}
    </p>

    <p>
        <strong>Notes:</strong>
        {{ $client->notes }}
    </p>

</div>

<h2>Appointment History</h2>

<table>

    <thead>

        <tr>
            <th>Date</th>
            <th>Service</th>
            <th>Time</th>
            <th>Status</th>
        </tr>

    </thead>

    <tbody>

        @forelse($client->appointments as $appointment)

        <tr>

            <td>
                {{ $appointment->appointment_date }}
            </td>

            <td>
                {{ $appointment->service }}
            </td>

            <td>
                {{ $appointment->start_time }}
                -
                {{ $appointment->end_time }}
            </td>

            <td>
                {{ ucfirst($appointment->status) }}
            </td>

        </tr>

        @empty

        <tr>

            <td colspan="4">
                No appointment history.
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection