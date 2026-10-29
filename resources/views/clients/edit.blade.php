@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')

<h1>Edit Client</h1>

<form action="{{ route('clients.update', $client) }}" method="POST">

@csrf
@method('PUT')

<label>First Name</label>

<input
    type="text"
    name="first_name"
    value="{{ old('first_name', $client->first_name) }}"
    required
>

<label>Last Name</label>

<input
    type="text"
    name="last_name"
    value="{{ old('last_name', $client->last_name) }}"
    required
>

<label>Phone</label>

<input
    type="text"
    name="phone"
    value="{{ old('phone', $client->phone) }}"
    required
>

<label>Email</label>

<input
    type="email"
    name="email"
    value="{{ old('email', $client->email) }}"
>

<label>Address</label>

<textarea name="address">{{ old('address', $client->address) }}</textarea>

<label>Notes</label>

<textarea name="notes">{{ old('notes', $client->notes) }}</textarea>

<button type="submit">
    Update Client
</button>

<a href="{{ route('clients.show', $client) }}">
    Cancel
</a>

</form>

@endsection