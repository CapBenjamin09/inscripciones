<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ScheduleDetails;
use Illuminate\Http\Request;

class ScheduleDetailController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->search);
        $schedulesDetails = ScheduleDetails::where('course', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(5);

        return view('schedules.scheduleDetails.index', compact('schedulesDetails', 'search'));
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
            'teacher' => ['required', 'min:2', 'max:50'],
            'schedule_id' => ['']
        ]);

        ScheduleDetails::create([
            'day' => $request->day,
            'hour' => $request->hour,
            'course' => $request->course,
            'teacher' => $request->teacher,
            'schedule_id'=> $request->schedule_id
        ]);
        //
        return redirect()->route('scheduleDetails.index')->with('status', 'Se ha creado correctamente!');
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
        $scheduleDetail->teacher = $request->teacher;
        $scheduleDetail->schedule_id = $request->schedule_id;

        $scheduleDetail->update();
        return redirect()->route('scheduleDetails.index')->with('status', 'ok!');
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
