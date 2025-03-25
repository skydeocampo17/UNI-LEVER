@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit College</h2>
    <form action="{{ route('colleges.update', $college->CollegeID) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="CollegeName" class="form-label">College Name</label>
            <input type="text" class="form-control" id="CollegeName" name="CollegeName" value="{{ $college->CollegeName }}" required>
        </div>
        <div class="mb-3">
            <label for="CollegeCode" class="form-label">College Code</label>
            <input type="text" class="form-control" id="CollegeCode" name="CollegeCode" value="{{ $college->CollegeCode }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1" {{ $college->IsActive ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
