@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Colleges</h2>
    <a href="{{ route('colleges.create') }}" class="btn btn-primary mb-3 shadow-sm">➕ Add College</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <x-table :headers="['ID', 'College Name', 'College Code', 'Is Active', 'Actions']">
        @foreach($colleges as $college)
            <tr class="align-middle text-center">
                <td>{{ $college->CollegeID }}</td>
                <td>{{ $college->CollegeName }}</td>
                <td>{{ $college->CollegeCode }}</td>
                <td>
                    <span class="badge {{ $college->IsActive ? 'bg-success' : 'bg-danger' }}">
                        {{ $college->IsActive ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('colleges.show', $college->CollegeID) }}" class="btn btn-info btn-sm shadow-sm">👁 View</a>
                    <a href="{{ route('colleges.edit', $college->CollegeID) }}" class="btn btn-warning btn-sm shadow-sm">✏ Edit</a>
                    <form action="{{ route('colleges.destroy', $college->CollegeID) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">🗑 Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-table>
</div>
@endsection
