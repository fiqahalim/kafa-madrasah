<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request, ?Appointment $appointment = null)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        $data = $request->all();
        if ($appointment) {
            $appointment->update($data);

            return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
        } else {
            Appointment::create($data);

            return redirect()->route('appointments.index')->with('success', 'Appointment added successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
