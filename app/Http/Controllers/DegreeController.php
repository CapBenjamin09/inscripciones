<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index(){
        return view('degrees.index');
    }
}
