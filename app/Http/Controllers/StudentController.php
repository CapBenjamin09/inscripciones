<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Degree;
use App\Models\Record;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $students = Student::where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $search . '%')
                            ->orWhere('student_personal_code', 'LIKE', '%' . $search . '%')
                            ->orderBy('name', 'asc')->paginate(10);
        return view('students.index', compact('students', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $degrees = Degree::all();
        return view('students.create', compact('degrees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        $validated['status_student'] = 'activo';

        Student::create($validated);
        return redirect()->route('students.index')->with('status', 'Alumno creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $records = Record::where('student_id', $student->id)->get();
        return view('students.show', compact('student', 'records'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $degrees = Degree::all();
        return view('students.edit', compact('degrees', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $student->update($validated);

        return redirect()->route('students.index')->with('status', 'El registro se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('eliminar', 'ok');
    }
}
