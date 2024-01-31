<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'email' => ['required', 'email'],
            'password' => ['required']
        ]);



        if (!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Datos Incorrectos, por favor verifique');
        }
//
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }
}
