
@extends('layouts.app')

@section('title', 'Clients')

@section('content')

<div class="page-header">
    <div>
        <h1>Clients</h1>
        <p>Manage your client records.</p>
    </div>

    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        + Add Client
    </a>
</div>

<table>

    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        @forelse($clients as $client)

        <tr>

            <td>
                <strong>
                    {{ $client->first_name }}
                    {{ $client->last_name }}
                </strong>
            </td>

            <td>
                {{ $client->phone }}
            </td>

            <td>
                {{ $client->email }}
            </td>

            <td>

                <div class="actions">

                    <a
                        href="{{ route('clients.show', $client) }}"
                        class="btn btn-secondary"
                    >
                        View
                    </a>

                    <a
                        href="{{ route('clients.edit', $client) }}"
                        class="btn btn-primary"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('clients.destroy', $client) }}"
                        method="POST"
                        style="display: inline;"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-delete"
                            onclick="return confirm('Are you sure you want to delete this client?')"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4">
                No clients found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection

