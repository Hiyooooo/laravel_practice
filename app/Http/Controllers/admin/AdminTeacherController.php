<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->paginate(10);

        $subjects = Subject::all();

        return view('admin.teacher.index', [
            'title' => 'Teacher List',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Teacher berhasil ditambahkan!');
    }

    /** UPDATE TEACHER */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        $teacher->update($validated);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Teacher berhasil diupdate!');
    }

    /** DELETE TEACHER */
    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Teacher berhasil dihapus!');
    }
}
