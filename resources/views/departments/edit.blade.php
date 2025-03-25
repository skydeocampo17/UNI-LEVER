@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Department</h2>
    <form action="{{ route('departments.update', $department->DepartmentID) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="CollegeID" value="{{ $department->CollegeID }}">

        <div class="mb-3">
            <label for="DepartmentName" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="DepartmentName" name="DepartmentName" value="{{ $department->DepartmentName }}" required>
        </div>

        <div class="mb-3">
            <label for="DepartmentCode" class="form-label">Department Code</label>
            <input type="text" class="form-control" id="DepartmentCode" name="DepartmentCode" value="{{ $department->DepartmentCode }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1" {{ $department->IsActive ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('departments.index', ['college' => $department->CollegeID]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
