@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Department Details</h2>

    <div class="mb-3">
        <strong>Department Name:</strong> {{ $department->DepartmentName }}
    </div>

    <div class="mb-3">
        <strong>Department Code:</strong> {{ $department->DepartmentCode }}
    </div>

    <div class="mb-3">
        <strong>College:</strong> {{ $department->college->CollegeName }}
    </div>

    <div class="mb-3">
        <strong>Is Active:</strong> {{ $department->IsActive ? 'Yes' : 'No' }}
    </div>

    <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning">✏ Edit</a>
    <a href="{{ route('departments.index', ['college' => $department->CollegeID]) }}" class="btn btn-secondary">Back</a>
</div>
@endsection
