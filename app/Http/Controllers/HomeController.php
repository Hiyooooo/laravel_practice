<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // mengembalikan view beranda
        return view('home', [
            'title' => 'Home'
        ]);
    }
}
