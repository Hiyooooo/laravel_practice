<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function Classrooms()
    {
        $classrooms = Classroom::all();
        return view('classroom', [
            'classrooms' => $classrooms,
            'title' => 'Classroom Data',
        ]);
    }

    public function adminIndex()
    {
        $classroom = Classroom::all();

        // Mengarah ke resources/views/admin/classroom.blade.php
        return view('components.admin.classroom', [
            'title' => 'Data Classroom (Admin)',
            'classroom' => $classroom
        ]);
    }
}
