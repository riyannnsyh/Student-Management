<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{

    public function index(): View
    {
        $students = Student::simplePaginate(5);
    return view('students.index', compact('students'));
    }

 
    public function create(): View
    {
        return view('students.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);
    
        Student::create($validated);
    
        return redirect('/student')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    public function edit(string $id): View
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);
    
        $student = Student::find($id);
        $student->update($validated);
    
        return redirect('/student')->with('success', 'Data siswa berhasil diperbarui!');
    }

    
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Data siswa berhasil dihapus!');

    }
}