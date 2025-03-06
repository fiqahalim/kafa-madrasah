<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Program;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.dashboard', [
            'total_teachers' => Teacher::count(),
            'total_students' => Student::count(),
            'total_programs' => Program::count(),
            'total_products' => Product::count(),
            'total_appointments' => Appointment::count(),
            'total_users' => User::count(),
        ]);
    }
}