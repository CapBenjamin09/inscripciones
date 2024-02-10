<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\Models\Record;
use App\Models\Registrations;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    public function create()
    {
        $students = Student::all();
        return view('records.create', compact('students'));
    }

    public function store(StoreRecordRequest $request)
    {
        $validate = $request->validated();
        $validate['file'] = $request->file('fileRecord')->store('files');
        Record::create($validate);

        return redirect()->route('students.index')->with('status', 'Se ha añadido el archivo correctamente!');
    }

    public function destroy(Record $record)
    {
        $idRegistration = DB::table('registrations')->where('voucher_record',$record->file )->get('id')->last();
        if (isset($idRegistration->id) == true) {
            $data = Registrations::find($idRegistration->id);
            $data->voucher_record = null;
            $data->save();
        }
        $image_path = str_replace('files/', '',$record->file);
        if (Storage::disk('files')->exists($image_path)) {
            Storage::disk('files')->delete($image_path);
        }
        $record->delete();

        return back()->with('eliminar', 'ok');
    }
}
