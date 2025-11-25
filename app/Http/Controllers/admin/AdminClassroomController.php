<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('students')->paginate(10);

        return view('admin.classroom.index', [
            'title' => 'Data Classrooms',
            'classrooms' => $classrooms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('classroom.index')
            ->with('success', 'Classroom berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classroom->update($validated);

        return redirect()
            ->route('classroom.index')
            ->with('success', 'Classroom berhasil diupdate!');
    }
}
