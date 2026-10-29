@extends('layouts.app')

@section('title', 'Add Client')

@section('content')

<h1>Add New Client</h1>

<form action="{{ route('clients.store') }}" method="POST">

    @csrf

    <label>First Name</label>

    <input
        type="text"
        name="first_name"
        value="{{ old('first_name') }}"
        required
    >

    <label>Last Name</label>

    <input
        type="text"
        name="last_name"
        value="{{ old('last_name') }}"
        required
    >

    <label>Phone</label>

    <input
        type="text"
        name="phone"
        value="{{ old('phone') }}"
        required
    >

    <label>Email</label>

    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
    >

    <label>Address</label>

    <textarea name="address">{{ old('address') }}</textarea>

    <label>Notes</label>

    <textarea name="notes">{{ old('notes') }}</textarea>

    <button type="submit">
        Save Client
    </button>

</form>

@endsection