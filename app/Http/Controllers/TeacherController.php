<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Display a list of teachers
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }

    // Show form for creating or editing a teacher
    public function edit(?Teacher $teacher = null)
    {
        return view('teachers.edit', compact('teacher'));
    }

    // Store or update teacher
    public function save(Request $request, ?Teacher $teacher = null)
    {
        $request->validate([
            'name' => 'required',
            'specialty' => 'required',
            'contact_no' => 'required',
            'status' => 'required|in:Active,Deactive',
            'join_date' => 'required|date',
        ]);

        $data = $request->all();

        if ($teacher) {
            $teacher->update($data);

            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
        } else {
            Teacher::create($data);
            
            return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
        }
    }

    // Delete a teacher
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}