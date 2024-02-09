<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\Degree;
use App\Models\Record;
use App\Models\Registrations;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registrations::all();
        return view('registrations.index', compact( 'registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all('id', 'student_personal_code', 'name', 'lastname');
        $degrees = Degree::all();
        return view('registrations.create', compact('students', 'degrees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationRequest $request)
    {
        $validate = $request->validated();
        $student = Student::find($validate['student_id']);

        if (isset($request->voucher_record)) {
            $nameFile = $request->file('voucher_record')->store('files');
            Registrations::create([
                'date' => Carbon::now(),
                'student_id' => $validate['student_id'],
                'cycle' => $validate['cycle'],
                'voucher_record' => $nameFile,
                'paid_registration' => $validate['paid_registration'],
                'comments' => $validate['comments'],
                'status' => $validate['status'],
                'degree_id' => $validate['degree_id']
            ]);

            Record::create([
                'student_id' => $validate['student_id'],
                'name' => 'Inscripción ' . $student->student_personal_code . ' ' . $student->name . ' ' . $student->lastname,
                'file' => $nameFile
            ]);
        } else {
            Registrations::create([
                'date' => Carbon::now(),
                'student_id' => $validate['student_id'],
                'cycle' => $validate['cycle'],
                'comments' => $validate['comments'],
                'status' => $validate['status'],
                'degree_id' => $validate['degree_id']
            ]);
        }



        return redirect()->route('registrations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrations $registration)
    {
        return view('registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrations $registration)
    {
        $students = Student::all('id', 'student_personal_code', 'name', 'lastname');
        $degrees = Degree::all();
        return view('registrations.edit',  compact('registration', 'students', 'degrees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationRequest $request, Registrations $registration)
    {
        $validate = $request->validated();

        $registration->degree_id = $validate['degree_id'];
        $registration->cycle = $validate['cycle'];
        $registration->paid_registration = $validate['paid_registration'];
        $registration->comments = $validate['comments'];
        $registration->status = $validate['status'];

        $idRecord = DB::table('records')->where('file',$registration->voucher_record )->get('id')->last();
        $student = Student::find($validate['student_id']);

        if ($request->file('voucher_record')) {
            $image_path = str_replace('files/', '',$registration->voucher_record);

            if (Storage::disk('files')->exists($image_path)) {
                Storage::disk('files')->delete($image_path);
            }

            $nameFile = $request->file('voucher_record')->store('files');

            if (isset($idRecord->id) == true) {
                $data = Record::find($idRecord->id);
                $data->delete();
                Record::create([
                    'student_id' => $validate['student_id'],
                    'name' => 'Inscripción ' . $student->student_personal_code . ' ' . $student->name . ' ' . $student->lastname,
                    'file' => $nameFile
                ]);
            } else {
                Record::create([
                    'student_id' => $validate['student_id'],
                    'name' => 'Inscripción ' . $student->student_personal_code . ' ' . $student->name . ' ' . $student->lastname,
                    'file' => $nameFile
                ]);
            }
            $registration->voucher_record = $nameFile;
            $registration->save();
        }

        return redirect()->route('registrations.index')->with('status', 'Se ha actualizado la inscripción correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrations $registration)
    {
        $idRecord = DB::table('records')->where('file',$registration->voucher_record )->get('id')->last();
        if (isset($idRecord->id) == true) {
            $data = Record::find($idRecord->id);
            $data->delete();
        }
        $image_path = str_replace('files/', '',$registration->voucher_record);
        if (Storage::disk('files')->exists($image_path)) {
            Storage::disk('files')->delete($image_path);
        }
        $registration->delete();

        return redirect()->route('registrations.index')->with('eliminar', 'ok');
    }
}
