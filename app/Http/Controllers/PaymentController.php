<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
//        $students = Student::all();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('payments.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $validate = $request->validated();
        $validate['voucher'] = $request->file('voucher')->store('files');
        $validate['date_payment'] = Carbon::now();

        Payment::create($validate);

        return redirect()->route('payments.index')->with('status', 'Se ha agregado una mensualidad correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        // Puedes pasar la información necesaria al modal
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $students = Student::all();
        return view('payments.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $image_path = str_replace('files/', '',$payment->voucher);
        if (Storage::disk('files')->exists($image_path)) {
            Storage::disk('files')->delete($image_path);
        }
        $payment->delete();

        return redirect()->route('payments.index')->with('eliminar', 'ok');
    }
}
