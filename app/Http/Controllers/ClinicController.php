<?php

// app/Http/Controllers/BranchController.php

namespace App\Http\Controllers;

// Update the import statements
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;



class ClinicController extends Controller
{
    public function createForm()
{
    // Fetch all clinics from the database
    $clinics = Clinic::all();

    // Pass the clinics to the view
    return view('create_clinic', compact('clinics'));

}

public function create(Request $request)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'contact' => 'required',
        'status' => 'required',
    ]);

    $clinic = Clinic::create($request->all());

    // Redirect back to the create form with a success message
    return redirect()->route('clinic.create.form')->with('success', 'Clinic created successfully');
}

public function view()
{
    // Retrieve all clinics from the database
    $clinics = Clinic::all();

    // Pass the clinics data to the view
    return view('view_clinics', compact('clinics'));
}

public function archive($id)
{
    $clinic = Clinic::find($id);

    if ($clinic) {
        $clinic->delete();
        return redirect()->route('clinic.view')->with('success', 'Clinic deleted successfully');
    }

    return redirect()->route('clinic.view')->with('error', 'Clinic not found');
}

public function editForm($id)
{
    $clinic = Clinic::find($id);

    if ($clinic) {
        return view('edit_clinic', compact('clinic'));
    }

    return redirect()->route('clinic.view')->with('error', 'Clinic not found');
}

public function update(Request $request, $id)
{
    $clinic = Clinic::find($id);

    if ($clinic) {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'status' => 'required',
        ]);

        $clinic->update($request->all());
        return redirect()->route('clinic.view')->with('success', 'Clinic updated successfully');
    }

    return redirect()->route('clinic.view')->with('error', 'Clinic not found');
}

}