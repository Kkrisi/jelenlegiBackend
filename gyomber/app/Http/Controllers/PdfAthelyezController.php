<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PdfAthelyezController extends Controller
{
    public function relocate(Request $request)
    {
        if ($request->hasFile('files')) {  // Több fájl kezelése
            $files = $request->file('files');
            $savedFiles = [];

            foreach ($files as $file) {
                $path = $file->storeAs('public/kuldendoFajlok', $file->getClientOriginalName());
                $savedFiles[] = $path;  // Minden fájl elérési útja hozzáadódik
            }

            return response()->json([
                'message' => 'Fájlok sikeresen feltöltve!',
                'files' => $savedFiles  // Több fájl elérési útja visszaadva
            ]);
        } else {
            return response()->json([
                'message' => 'Hiba történt a fájlok feltöltésekor.'
            ], 400);
        }
    }
}