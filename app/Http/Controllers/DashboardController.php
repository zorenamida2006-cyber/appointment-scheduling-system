<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        // Total clients
        $totalClients = Client::count();

        // Total appointments
        $totalAppointments = Appointment::count();

        // Appointment status counts
        $pendingAppointments = Appointment::where('status', 'pending')->count();

        $confirmedAppointments = Appointment::where('status', 'confirmed')->count();

        $completedAppointments = Appointment::where('status', 'completed')->count();

        $cancelledAppointments = Appointment::where('status', 'cancelled')->count();

        // Recent appointments
        $recentAppointments = Appointment::with('client')
            ->orderBy('appointment_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalClients',
            'totalAppointments',
            'pendingAppointments',
            'confirmedAppointments',
            'completedAppointments',
            'cancelledAppointments',
            'recentAppointments'
        ));
    }
}