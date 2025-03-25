@extends('layouts.app')

@section('content')
<div class="container">
    <h2>College Details</h2>
    <p><strong>Name:</strong> {{ $college->CollegeName }}</p>
    <p><strong>Code:</strong> {{ $college->CollegeCode }}</p>
    <p><strong>Active:</strong> {{ $college->IsActive ? 'Yes' : 'No' }}</p>

    <a href="{{ route('colleges.edit', $college->CollegeID) }}" class="btn btn-warning">✏ Edit</a>
    <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
