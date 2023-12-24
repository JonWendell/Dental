<?php

// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Your controller logic here, if needed

        // Return the new view
        return view('client.index');
    }
}
