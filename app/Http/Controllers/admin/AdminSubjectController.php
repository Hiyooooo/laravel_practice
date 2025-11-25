<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {

        $subjects = Subject::with('Teacher')->paginate(10);
        return view('admin.subject.index', [
            'title' => 'Subject List',
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create($validated);

        return redirect()
            ->route('subject.index')
            ->with('success', 'Subject berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update($validated);

        return redirect()
            ->route('subject.index')
            ->with('success', 'Subject berhasil diupdate!');
    }
}
