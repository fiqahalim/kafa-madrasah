@extends('layouts.app')

@section('content')
    <h1>Appointments</h1>
    <a href="{{ route('appointments.form') }}">Create Appointment</a>
    <ul>
        @foreach($appointments as $appointment)
            <li>{{ $appointment->date }} - <a href="{{ route('appointments.form', $appointment) }}">Edit</a> - 
                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection