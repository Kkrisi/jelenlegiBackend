<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    $request -> validate([
        'name'=>'required|string|max:255',
        'email'=>'required|string|max:255|unique:pending',
        'password' => 'required|string|min:8'

    ])
    $pendingUser = Pending::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return response()->json(['message' => 'Regisztráció sikeres, várunk az engedélyezésre'], 201);
}
