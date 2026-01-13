<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $guardians = Guardian::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('job', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->withQueryString();


        return view('admin.guardian.index', [
            'title' => 'Data Guardians',
            'guardians' => $guardians,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'required|email|unique:guardians,email',
        ]);

        Guardian::create($validated);

        return redirect()
            ->route('guardian.index')
            ->with('success', 'Guardian berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'required|email|unique:guardians,email,' . $guardian->id,
        ]);

        $guardian->update($validated);

        return redirect()
            ->route('guardian.index')
            ->with('success', 'Guardian berhasil diupdate!');
    }

    public function delete($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()
            ->route('guardian.index')
            ->with('success', 'Guardian berhasil dihapus!');
    }
}
