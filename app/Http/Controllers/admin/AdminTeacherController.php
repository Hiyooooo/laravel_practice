<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $teachers = Teacher::query()
            ->with('subject')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhereHas('subject', function ($s) use ($search) {
                            $s->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

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
