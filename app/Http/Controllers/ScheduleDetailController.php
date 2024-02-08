<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ScheduleDetails;
use Illuminate\Http\Request;

class ScheduleDetailController extends Controller
{
    public function index(Request $request)
    {

        $schedulesDetails = scheduleDetails::all();
        return view('schedules.scheduleDetails.index', compact('schedulesDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $id)
    {
        $schedules = Schedule::all();
        return view('schedules.scheduleDetails.create', compact('schedules', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'day' => ['required'],
            'hour' => ['required', 'min:2', 'max:50'],
            'course' => ['required', 'min:2', 'max:50'],
            'degree' => [''],
            'teacher' => ['required', 'min:2', 'max:50'],
            'schedule_id' => ['']
        ]);

        ScheduleDetails::create([
            'day' => $request->day,
            'hour' => $request->hour,
            'course' => $request->course,
            'degree' => $request->degree,
            'teacher' => $request->teacher,
            'schedule_id'=> $request->schedule_id
        ]);

        //
        return redirect()->route('scheduleDetails.index')->with('status', '¡Su registro ha sido creado con éxito!');
    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(SchedulesDetails $scheduleDetail)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
    public function edit(ScheduleDetails $scheduleDetail)
    {
        $schedules = Schedule::all();
        return view('schedules.scheduleDetails.edit', compact( 'schedules', 'scheduleDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduleDetails $scheduleDetail)
    {
        $scheduleDetail->day = $request->day;
        $scheduleDetail->hour = $request->hour;
        $scheduleDetail->course = $request->course;
        $scheduleDetail->degree = $request->degree;
        $scheduleDetail->teacher = $request->teacher;
        $scheduleDetail->schedule_id = $request->schedule_id;

        $scheduleDetail->update();
        return redirect()->route('scheduleDetails.index')->with('status', '¡Su registro se ha editado con éxito!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
    public function destroy(ScheduleDetails $scheduleDetail)
    {
        $scheduleDetail->delete();
        return back()->with('eliminar', 'ok');
    }
}
