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

}
