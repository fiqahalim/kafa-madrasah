<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();

        return view('programs.index', compact('programs'));
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
    public function save(Request $request, ?Program $program = null)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
        ]);

        $data = $request->all();
        if ($program) {
            $program->update($data);

            return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
        } else {
            Program::create($data);

            return redirect()->route('programs.index')->with('success', 'Program added successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
