<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $datasiswa = Student::with('classroom')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('birthdate', 'like', "%{$search}%") // betulin typo
                        ->orWhere('grade', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhereHas('classroom', function ($qc) use ($search) {
                            $qc->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

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
