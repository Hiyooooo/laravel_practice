<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $subjects = Subject::query()
            ->with('teacher')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('teacher', function ($t) use ($search) {
                            $t->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                                ->orWhere('phone', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

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
