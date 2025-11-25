<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    public function index()
    {
        $datasiswa = Student::with('classroom')->paginate(10);
        $classrooms = Classroom::all();

        return view('admin.student.index', [
            'title' => 'Data Students',
            'students' => $datasiswa,
            'classrooms' => $classrooms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'birthdate' => 'required|date',
            'phone' => 'required|string',
            'grade' => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Student berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'birthdate' => 'required|date',
            'phone' => 'required|string',
            'grade' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Student berhasil diupdate!');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Student berhasil dihapus!');
    }
}
