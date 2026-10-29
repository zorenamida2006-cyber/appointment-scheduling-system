<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('client')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $clients = Client::orderBy('last_name')->get();

        return view('appointments.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service' => 'required|max:255',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Prevent Schedule Conflict
        |--------------------------------------------------------------------------
        */

        $conflict = Appointment::where(
                'appointment_date',
                $validated['appointment_date']
            )
            ->whereIn('status', ['pending', 'confirmed'])
            ->where(function ($query) use ($validated) {

                $query->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

            })
            ->exists();

        if ($conflict) {
            return back()
                ->withInput()
                ->withErrors([
                    'start_time' =>
                        'This schedule conflicts with an existing appointment.'
                ]);
        }

        Appointment::create($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load('client');

        return view(
            'appointments.show',
            compact('appointment')
        );
    }

    public function edit(Appointment $appointment)
    {
        $clients = Client::orderBy('last_name')->get();

        return view(
            'appointments.edit',
            compact('appointment', 'clients')
        );
    }

    public function update(
        Request $request,
        Appointment $appointment
    ) {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service' => 'required|max:255',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable',
        ]);

        $conflict = Appointment::where(
                'appointment_date',
                $validated['appointment_date']
            )
            ->where('id', '!=', $appointment->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where(function ($query) use ($validated) {

                $query->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

            })
            ->exists();

        if ($conflict) {
            return back()
                ->withInput()
                ->withErrors([
                    'start_time' =>
                        'This schedule conflicts with another appointment.'
                ]);
        }

        $appointment->update($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}