@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Department to {{ $college->CollegeName }}</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="CollegeID" value="{{ $college->CollegeID }}">

        <div class="mb-3">
            <label for="DepartmentName" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="DepartmentName" name="DepartmentName" required>
        </div>
        <div class="mb-3">
            <label for="DepartmentCode" class="form-label">Department Code</label>
            <input type="text" class="form-control" id="DepartmentCode" name="DepartmentCode" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1">
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Add Department</button>
    </form>
</div>
@endsection
