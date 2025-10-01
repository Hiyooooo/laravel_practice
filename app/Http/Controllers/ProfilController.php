<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        $data = [
            'title' => 'Profile',
            'nama' => 'Adika Ruzain',
            'sekolah' => 'SMK RUS'
        ];

        return view('profil', $data);
    }
}
