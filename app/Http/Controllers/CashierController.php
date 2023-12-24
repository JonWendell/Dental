<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Session;
use App\Models\Branch;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class CashierController extends Controller
{
    public function show()
    {
        return view('cashier.cashier');
    }

   



    

}
