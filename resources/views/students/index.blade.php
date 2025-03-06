@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students List</h2>
    <a href="{{ route('students.form') }}" class="btn btn-primary mb-3">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Emergency Contact</th>
                <th>Status</th>
                <th>Joining Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->contact_no }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->emergency_contact_name }} ({{ $student->emergency_contact_no }})</td>
                    <td>{{ $student->status }}</td>
                    <td>{{ $student->joining_date }}</td>
                    <td>
                        <a href="{{ route('students.form', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
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
