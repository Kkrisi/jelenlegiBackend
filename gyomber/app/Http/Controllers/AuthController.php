<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validáció
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Hitelesítési kísérlet
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // Session újragenerálása a biztonság érdekében
            
            // Sikeres bejelentkezés válasza
            return response()->json([
                'message' => 'Bejelentkezés sikeres',
                'user' => Auth::user(), // Visszaadja a bejelentkezett felhasználót
            ], 200);
        }

        // Hibás hitelesítési adatok
        return response()->json([
            'message' => 'Helytelen email vagy jelszó',
        ], 422);
    }
}


