<?php

// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // Get the authenticated user's clinic ID
        $clinicId = Auth::user()->clinic_id;

        // Retrieve appointments only for the user's clinic
        $appointments = Auth::user()->appointments()->whereHas('user', function ($query) use ($clinicId) {
            $query->where('clinic_id', $clinicId);
        })->get();

        return view('client.index', compact('appointments'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
    ]);

    // Determine the appointment status based on the button clicked
    $status = $request->input('status', 'pending');

    // Create a new appointment with the determined status
    Auth::user()->appointments()->create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'appointment_date' => $request->input('appointment_date'),
        'appointment_time' => $request->input('appointment_time'),
        'user_id' => Auth::id(),
        'status' => $status,
    ]);

    // Redirect to the index page with a success message
    return redirect()->route('customer')->with('success', 'Appointment ' . ($status == 'pending' ? 'requested' : 'completed') . ' successfully');
}
}
