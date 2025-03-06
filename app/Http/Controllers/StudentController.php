<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a list of students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Show form for creating or editing a student
    public function form(?Student $student = null)
    {
        return view('students.edit', compact('student'));
    }

    // Store or update student
    public function save(Request $request, ?Student $student = null)
    {
        $request->validate([
            'name' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'emergency_contact_name' => 'required',
            'emergency_contact_no' => 'required',
            'status' => 'required|in:Active,Inactive',
            'joining_date' => 'required|date',
        ]);

        $data = $request->all();

        if ($student) {
            $student->update($data);

            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        } else {
            Student::create($data);

            return redirect()->route('students.index')->with('success', 'Student added successfully.');
        }
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();
        
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
