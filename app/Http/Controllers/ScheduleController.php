<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $schedules = Schedule::where('degree', 'LIKE', '%' . $search . '%')->orderBy('title', 'asc')->paginate(4);

        return view('schedules.index', compact('schedules', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:2', 'max:50'],
            'degree' => ['required', 'min:2', 'max:50'],
        ]);

        Schedule::create([
            'title' => $request->title,
            'degree' => $request->degree
        ]);

        return redirect()->route('schedules.index')->with('status', 'Se ha creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->title = $request->title;
        $schedule->degree = $request->degree;

        $schedule->update();
        return redirect()->route('schedules.index')->with('status', 'ok!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back()->with('eliminar', 'ok');
    }
}
