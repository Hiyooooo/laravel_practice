<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    // GET /datasiswa
    public function index()
    {
        $students = Student::all();

        return view('datasiswa', [
            'title' => 'Student List',
            'students' => $students,
        ]);
    }

    // GET /datasiswa/create
    public function create()
    {
        return view('datasiswa_create');
    }

    // POST /datasiswa
    public function store(Request $request)
    {
        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // GET /datasiswa/{id}
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('datasiswa_show', compact('student'));
    }

    // GET /datasiswa/{id}/edit
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('datasiswa_edit', compact('student'));
    }

    // PUT /datasiswa/{id}
    public function update(Request $request, $id)
    {

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    // DELETE /datasiswa/{id}
    public function destroy($id)
    {

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
