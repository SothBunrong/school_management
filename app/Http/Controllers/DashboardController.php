<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalDepartments = Department::count();

        return view('dashboard', compact(
            'totalStudents',
            'totalDepartments'
        ));
    }
}
