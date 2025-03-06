@extends('layouts.app')

@section('content')
    <h1>{{ isset($appointment) ? 'Edit Appointment' : 'Create Appointment' }}</h1>
    <form action="{{ isset($appointment) ? route('appointments.save', $appointment) : route('appointments.save') }}" method="POST">
        @csrf
        <input type="date" name="date" value="{{ old('date', $appointment->date ?? '') }}">
        <button type="submit">Save</button>
    </form>
@endsection