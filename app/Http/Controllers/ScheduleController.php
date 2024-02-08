<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ScheduleDetails;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $schedules = Schedule::where('assignment', 'LIKE', '%' . $search . '%')->orderBy('title', 'asc')->paginate(4);

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
            'assignment' => ['required', 'min:2', 'max:50'],
        ]);

        Schedule::create([
            'title' => $request->title,
            'assignment' => $request->assignment
        ]);

        return redirect()->route('schedules.index')->with('status', '¡Su registro ha sido creado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule, Request $request) {
        $schedules = Schedule::all();
        $mondays = ScheduleDetails::where('schedule_id', $schedule->id)->where('day', '=', 'Lunes')->orderBy('hour', 'asc')->get();
        $tuesdays = ScheduleDetails::where('schedule_id', $schedule->id)->where('day', '=', 'Martes')->orderBy('hour', 'asc')->get();
        $wednesdays = ScheduleDetails::where('schedule_id', $schedule->id)->where('day', '=', 'Miércoles')->orderBy('hour', 'asc')->get();
        $thursdays = ScheduleDetails::where('schedule_id', $schedule->id)->where('day', '=', 'Jueves')->orderBy('hour', 'asc')->get();
        $fridays = ScheduleDetails::where('schedule_id', $schedule->id)->where('day', '=', 'Viernes')->orderBy('hour', 'asc')->get();

        return view('schedules.show', compact(
            'schedule',
            'schedules',
            'mondays',
            'tuesdays',
            'wednesdays',
            'thursdays',
            'fridays'
        ));
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
        $schedule->assignment = $request->assignment;

        $schedule->update();
        return redirect()->route('schedules.index')->with('status', '¡Su registro se ha editado con éxito!');
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
