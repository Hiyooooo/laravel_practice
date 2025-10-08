<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::all();

        return view('teacher', [
            'title' => 'Teacher List',
            'teachers' => $teachers,
        ]);
    }
}
