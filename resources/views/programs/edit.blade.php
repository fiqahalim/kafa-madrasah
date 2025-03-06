@extends('layouts.app')

@section('content')
    <h1>{{ isset($program) ? 'Edit Program' : 'Create Program' }}</h1>
    <form action="{{ isset($program) ? route('programs.save', $program) : route('programs.save') }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ old('name', $program->name ?? '') }}" placeholder="Program Name">
        <textarea name="description" placeholder="Description">{{ old('description', $program->description ?? '') }}</textarea>
        <input type="number" name="duration" value="{{ old('duration', $program->duration ?? '') }}" placeholder="Duration (in months)">
        <button type="submit">Save</button>
    </form>
@endsection