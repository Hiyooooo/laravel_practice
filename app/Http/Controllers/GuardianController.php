<?php

namespace App\Http\Controllers;

use App\Models\Guardian;

class GuardianController extends Controller
{
    public function guardians()
    {
        $guardians = Guardian::all();

        return view('guardian', [
            'title' => 'Guardian List',
            'guardians' => $guardians,
        ]);
    }
}
