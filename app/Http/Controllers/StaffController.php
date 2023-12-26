<?php

namespace App\Http\Controllers;
use App\Models\Appointment;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        // Get pending appointments
        $pendingAppointments = Appointment::where('status', 'pending')->get();

        return view('staff.staff', compact('pendingAppointments'));
    }

    // Add the method to complete appointments
    public function completeAppointment(Appointment $appointment)
    {
        $appointment->update(['status' => 'completed']);

        return redirect()->route('staff')->with('success', 'Appointment completed successfully');
    }
}
