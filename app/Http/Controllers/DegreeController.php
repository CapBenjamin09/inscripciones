<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::paginate(5);;
        return view('degrees.index', compact('degrees'));
    }

    public function create()
    {
        return view('degrees.create');
    }

    public function store(StoreDegreeRequest $request)
    {
        $validated = $request->validated();
        Degree::create($validated);
        return redirect()->route('degree.index')->with('status', 'Se ha creado un registro correctamente!');
    }

    public function show(Degree $degree)
    {
        $students = Student::where('degree_id', $degree->id)->get();
        return view('degrees.show', compact('degree', 'students'));
    }

    public function edit(Degree $degree)
    {
        return view('degrees.edit', compact('degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $validated = $request->validated();
        $degree->update($validated);
        return redirect()->route('degree.index')->with('status', 'El registro se actualizo correctamente!');
    }

    public function destroy(Degree $degree)
    {
        $degree->delete();

        return back()->with('eliminar', 'ok');
    }
}
