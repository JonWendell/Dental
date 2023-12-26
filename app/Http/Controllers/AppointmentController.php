<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function completedAppointments()
    {
        // Get completed appointments with additional information
        $completedAppointments = Appointment::where('status', 'completed')
            ->with(['user', 'user.clinic']) // Eager load relationships
            ->get();

        return view('appointment.completed', compact('completedAppointments'));
    }
}
