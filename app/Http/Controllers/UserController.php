<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->search);
        $users = User::where('name', 'LIKE', '%' . $search . '%')->orderBy('name', 'asc')->paginate(5);

        return view('auth.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'unique:users', 'max:100'],
            'password' => ['required', 'min:3', 'max:15'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('status', 'Se ha creado el usuario correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if (isset($request->password)){
            $user->password = $request->password;
        }


        $user->update();
        return redirect()->route('users.index')->with('status', 'Se ha actualizado el usuario correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('eliminar', 'ok');
    }
}
