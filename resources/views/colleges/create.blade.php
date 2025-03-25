@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add College</h2>
    <form action="{{ route('colleges.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="CollegeName" class="form-label">College Name</label>
            <input type="text" class="form-control" id="CollegeName" name="CollegeName" required>
        </div>
        <div class="mb-3">
            <label for="CollegeCode" class="form-label">College Code</label>
            <input type="text" class="form-control" id="CollegeCode" name="CollegeCode" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1" checked>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Add College</button>
    </form>
</div>
@endsection
