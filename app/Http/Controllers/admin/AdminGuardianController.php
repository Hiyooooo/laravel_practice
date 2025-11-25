<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index()
    {
        $guardians = Guardian::paginate(10);

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
