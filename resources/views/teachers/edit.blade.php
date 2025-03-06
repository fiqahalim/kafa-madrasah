@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($teacher) ? 'Edit' : 'Add' }} Teacher</h2>
    <form action="{{ isset($teacher) ? route('teachers.save', $teacher) : route('teachers.save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $teacher->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Specialty</label>
            <input type="text" name="specialty" class="form-control" value="{{ old('specialty', $teacher->specialty ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Contact No</label>
            <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $teacher->contact_no ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ isset($teacher) && $teacher->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Deactive" {{ isset($teacher) && $teacher->status == 'Deactive' ? 'selected' : '' }}>Deactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control" value="{{ old('join_date', $teacher->join_date ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($teacher) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection