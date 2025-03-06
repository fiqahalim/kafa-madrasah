@extends('layouts.app')

@section('content')
    <h1>Programs</h1>
    <a href="{{ route('programs.form') }}">Create Program</a>
    <ul>
        @foreach($programs as $program)
            <li>{{ $program->name }} - <a href="{{ route('programs.form', $program) }}">Edit</a> - 
                <form action="{{ route('programs.destroy', $program) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection