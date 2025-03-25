<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CollegeName' => 'required|string|max:255',
            'CollegeCode' => 'required|string|max:50|unique:colleges,CollegeCode',
            'IsActive' => 'nullable|boolean'
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College added successfully.');
    }

    public function show($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.show', compact('college'));
    }

    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $college = College::findOrFail($id);

        $request->validate([
            'CollegeName' => 'required|string|max:255',
            'CollegeCode' => 'required|string|max:50|unique:colleges,CollegeCode,' . $id . ',CollegeID',
        ]);

        $isActive = $request->has('IsActive') ? 1 : 0;

        $college->update([
            'CollegeName' => $request->CollegeName,
            'CollegeCode' => $request->CollegeCode,
            'IsActive' => $isActive,
        ]);

        return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
    }


    public function destroy($id)
    {
        College::findOrFail($id)->delete();
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
    }

    public function select()
    {
        $colleges = College::all();
        return view('colleges.select', compact('colleges'));
    }
}
