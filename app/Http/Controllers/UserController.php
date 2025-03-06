<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        return view('user.dashboard', [
            'appointments' => $user->appointments, // Fetch user appointments
            'products' => $user->purchases, // Fetch purchased products
        ]);
    }
}
