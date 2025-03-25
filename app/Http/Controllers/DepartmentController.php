<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\College;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $collegeID = $request->query('college');
        if (!$collegeID) {
            return redirect()->route('colleges.select')->with('error', 'Please select a college first.');
        }

        $college = College::findOrFail($collegeID);
        $departments = Department::where('CollegeID', $collegeID)->get();

        return view('departments.index', compact('departments', 'college'));
    }

    public function create(Request $request)
    {
        $collegeID = $request->query('college');
        if (!$collegeID) {
            return redirect()->route('colleges.select')->with('error', 'Please select a college first.');
        }

        $college = College::findOrFail($collegeID);
        return view('departments.create', compact('college'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'DepartmentName' => 'required|string|max:255',
            'DepartmentCode' => 'required|string|max:50|unique:departments,DepartmentCode',
            'IsActive' => 'nullable|boolean'
        ]);

        $collegeID = $request->query('college');
        if (!$collegeID || !College::find($collegeID)) {
            return redirect()->route('colleges.select')->with('error', 'Invalid college selection.');
        }

        Department::create([
            'CollegeID' => $collegeID,
            'DepartmentName' => $request->DepartmentName,
            'DepartmentCode' => $request->DepartmentCode,
            'IsActive' => $request->IsActive ?? 0
        ]);

        return redirect()->route('departments.index', ['college' => $collegeID])
                        ->with('success', 'Department added successfully.');
    }

    public function show($id)
    {
        $department = Department::with('college')->findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        
        $request->validate([
            'DepartmentName' => 'required|string|max:255',
            'DepartmentCode' => 'required|string|max:50|unique:departments,DepartmentCode,'.$id.',DepartmentID',
            'IsActive' => 'nullable|boolean'
        ]);

        $department->update([
            'DepartmentName' => $request->DepartmentName,
            'DepartmentCode' => $request->DepartmentCode,
            'IsActive' => $request->IsActive ?? 0
        ]);

        return redirect()->route('departments.index', ['college' => $department->CollegeID])
                        ->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $collegeID = $department->CollegeID; 
        $department->delete();

        return redirect()->route('departments.index', ['college' => $collegeID])
                        ->with('success', 'Department deleted successfully.');
    }
}
