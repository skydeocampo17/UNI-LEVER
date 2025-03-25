@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Departments</h2>
    <a href="{{ route('departments.create', ['college' => request('college')]) }}" class="btn btn-primary mb-3 shadow-sm">➕ Add Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <x-table :headers="['ID', 'Department Name', 'Department Code', 'College', 'Is Active', 'Actions']">
        @foreach($departments as $department)
            <tr class="align-middle text-center">
                <td>{{ $department->DepartmentID }}</td>
                <td>{{ $department->DepartmentName }}</td>
                <td>{{ $department->DepartmentCode }}</td>
                <td>{{ $department->college->CollegeName }}</td>
                <td>
                    <span class="badge {{ $department->IsActive ? 'bg-success' : 'bg-danger' }}">
                        {{ $department->IsActive ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('departments.show', $department->DepartmentID) }}" class="btn btn-info btn-sm shadow-sm">👁 View</a>
                    <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm shadow-sm">✏ Edit</a>
                    <form action="{{ route('departments.destroy', $department->DepartmentID) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this department?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">🗑 Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-table>
</div>
@endsection
