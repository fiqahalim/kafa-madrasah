@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($student) ? 'Edit' : 'Add' }} Student</h2>
    <form action="{{ isset($student) ? route('students.save', $student) : route('students.save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $student->contact_no ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $student->address ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Emergency Contact Name</label>
            <input type="text" name="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name', $student->emergency_contact_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Emergency Contact No</label>
            <input type="text" name="emergency_contact_no" class="form-control" value="{{ old('emergency_contact_no', $student->emergency_contact_no ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ isset($student) && $student->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ isset($student) && $student->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Joining Date</label>
            <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $student->joining_date ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($student) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
