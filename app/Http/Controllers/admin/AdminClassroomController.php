<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $classrooms = Classroom::query()
            ->with('students')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhereHas('students', function ($s) use ($search) {
                            $s->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                                ->orWhere('phone', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

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
