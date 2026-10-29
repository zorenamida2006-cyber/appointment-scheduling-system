@extends('layouts.app')

@section('title', 'New Appointment')

@section('content')

<h1>Create Appointment</h1>

<form
    action="{{ route('appointments.store') }}"
    method="POST"
>

    @csrf

    <label>Client</label>

    <select name="client_id" required>

        <option value="">
            Select Client
        </option>

        @foreach($clients as $client)

            <option
                value="{{ $client->id }}"
                {{ old('client_id') == $client->id ? 'selected' : '' }}
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
        value="{{ old('service') }}"
        placeholder="Example: Consultation"
        required
    >

    <label>Appointment Date</label>

    <input
        type="date"
        name="appointment_date"
        value="{{ old('appointment_date') }}"
        required
    >

    <label>Start Time</label>

    <input
        type="time"
        name="start_time"
        value="{{ old('start_time') }}"
        required
    >

    <label>End Time</label>

    <input
        type="time"
        name="end_time"
        value="{{ old('end_time') }}"
        required
    >

    <label>Status</label>

    <select name="status">

        <option value="pending">
            Pending
        </option>

        <option value="confirmed">
            Confirmed
        </option>

        <option value="completed">
            Completed
        </option>

        <option value="cancelled">
            Cancelled
        </option>

    </select>

    <label>Notes</label>

    <textarea name="notes"></textarea>

    <button type="submit">
        Save Appointment
    </button>

</form>

@endsection