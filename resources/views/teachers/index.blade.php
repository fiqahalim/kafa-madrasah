@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Teachers List</h2>
    <a href="{{ route('teachers.form') }}" class="btn btn-primary mb-3">Add Teacher</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->specialty }}</td>
                    <td>{{ $teacher->contact_no }}</td>
                    <td>{{ $teacher->status }}</td>
                    <td>{{ $teacher->join_date }}</td>
                    <td>
                        <a href="{{ route('teachers.form', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
