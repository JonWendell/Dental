<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Branch;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        // Fetch all branches from the database
        $branches = Branch::all();
    
        return view('logins.register', compact('branches'));
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:50',
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'middleName' => 'nullable|string|max:50',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer',
            'email' => 'required|email|max:50',
            'role' => 'required|in:admin,cashier,client',
            'password' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id', // Add this line for branch validation
        ]);
    
        // Hash the password before creating the user
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create a new user using the User model
        User::create($validatedData);
    
        // Add any additional registration logic here (e.g., sending emails, etc.)
    
        return redirect()->route('login.form');
    }

        public function showLoginForm()
        {
            return view('logins.login');
        }

        public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if ($user && Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
        // Check if the user has access to the current branch
        if ($user->branch_id === auth()->user()->branch_id) {
            // Redirect based on the user's role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.home');
                case 'cashier':
                    return redirect('/cashier');
                case 'client':
                    return redirect()->route('customer');
                default:
                    return redirect()->route('dashboard');
            }
        } else {
            // User does not have access to the current branch
            Auth::logout();
            return redirect()->route('login.form')->with('error', 'You do not have access to this branch.');
        }
    }

    // Redirect back to the login form if authentication fails
    return redirect()->route('login.form')->with('error', 'Invalid credentials');
}
    
        // ... (other methods)
    
        public function logout()
        {
            // Check if the user is logged in
            if (Auth::check()) {
                // Get the currently authenticated user
                $user = Auth::user();
        
                // Log the user out
                Auth::logout();
        
                // Clear all session data
                Session::flush();
        
                // Redirect to the login form with a success message
                return redirect()->route('login.form')->with('success', "You have been logged out successfully, $user->name.");
            }
        
            // If the user is not logged in, simply redirect to the login form
            return redirect()->route('login.form');
        }


}