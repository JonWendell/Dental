<?php

// app/Http/Controllers/BranchController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\User;

class BranchController extends Controller
{
    public function createForm()
    {
        // Fetch all branches from the database
        $branches = Branch::all();

        // Pass the branches to the view
        return view('create_branch', compact('branches'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'status' => 'required',
        ]);

        $branch = Branch::create($request->all());

        // Redirect back to the create form with a success message
        return redirect()->route('branch.create.form')->with('success', 'Branch created successfully');
    }

    public function view()
    {
        // Retrieve all branches from the database
        $branches = Branch::all();

        // Pass the branches data to the view
        return view('view_branches', compact('branches'));
    }

    public function archive($id)
    {
        $branch = Branch::find($id);

        if ($branch) {
            $branch->delete();
            return redirect()->route('branch.view')->with('success', 'Branch deleted successfully');
        }

        return redirect()->route('branch.view')->with('error', 'Branch not found');
    }

    public function editForm($id)
    {
        $branch = Branch::find($id);

        if ($branch) {
            return view('edit_branch', compact('branch'));
        }

        return redirect()->route('branch.view')->with('error', 'Branch not found');
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);

        if ($branch) {
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'contact' => 'required',
                'status' => 'required',
            ]);

            $branch->update($request->all());
            return redirect()->route('branch.view')->with('success', 'Branch updated successfully');
        }

        return redirect()->route('branch.view')->with('error', 'Branch not found');
    }
}



