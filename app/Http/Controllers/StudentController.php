<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('department');

        if ($request->filled('search')) {
            $query->where('student_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('dept_id')) {
            $query->where('dept_id', $request->dept_id);
        }

        $students = $query->latest('student_id')
            ->paginate(10)
            ->withQueryString();

        $departments = Department::all();

        return view('students.index', compact(
            'students',
            'departments'
        ));
    }

    public function create()
    {
        $departments = Department::all();

        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'enrollment' => 'required|string|max:255|unique:students,enrollment',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,dept_id'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        $student->load('department');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $departments = Department::all();

        return view('students.edit', compact(
            'student',
            'departments'
        ));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'enrollment' => 'required|string|max:255|unique:students,enrollment,' . $student->student_id . ',student_id',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'dept_id' => 'required|exists:departments,dept_id'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
    public function getRouteKeyName(): string
{
    return 'student_id';
}
}
