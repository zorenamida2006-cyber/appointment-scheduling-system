@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')

<h1>Edit Appointment</h1>

<form action="{{ route('appointments.update', $appointment) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Client</label>

    <select name="client_id" required>

        <option value="">
            Select Client
        </option>

        @foreach($clients as $client)

            <option
                value="{{ $client->id }}"
                {{ old('client_id', $appointment->client_id) == $client->id ? 'selected' : '' }}
            >

                {{ $client->first_name }}
                {{ $client->last_name }}

            </option>

        @endforeach

    </select>


    <label>Service</label>

    <input
        type="text"
        name="service"
        value="{{ old('service', $appointment->service) }}"
        required
    >


    <label>Appointment Date</label>

    <input
        type="date"
        name="appointment_date"
        value="{{ old('appointment_date', $appointment->appointment_date) }}"
        required
    >


    <label>Start Time</label>

    <input
        type="time"
        name="start_time"
        value="{{ old('start_time', $appointment->start_time) }}"
        required
    >


    <label>End Time</label>

    <input
        type="time"
        name="end_time"
        value="{{ old('end_time', $appointment->end_time) }}"
        required
    >


    <label>Status</label>

    <select name="status" required>

        <option
            value="pending"
            {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}
        >
            Pending
        </option>

        <option
            value="confirmed"
            {{ old('status', $appointment->status) == 'confirmed' ? 'selected' : '' }}
        >
            Confirmed
        </option>

        <option
            value="completed"
            {{ old('status', $appointment->status) == 'completed' ? 'selected' : '' }}
        >
            Completed
        </option>

        <option
            value="cancelled"
            {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}
        >
            Cancelled
        </option>

    </select>


    <label>Notes</label>

    <textarea name="notes">{{ old('notes', $appointment->notes) }}</textarea>


    <button type="submit">
        Update Appointment
    </button>

    <a href="{{ route('appointments.index') }}">
        Cancel
    </a>

</form>

@endsection