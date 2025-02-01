<?php

namespace App\Http\Controllers;

use App\Models\dolgozo;
use Illuminate\Http\Request;



//1. js-el
class CsvController extends Controller
{   


    public function saveJsonToDatabase(Request $request)
    {
        // Validálás
        $request->validate([
            'json' => 'required|json', // JSON formátum ellenőrzése, hogy ha a json mező hiányzik, vagy nem megfelelő JSON formátumú adat érkezik, akkor a kód hibát dob, és nem folytatódik
        ]);

        // JSON dekódolása
        $students = json_decode($request->json, true);  //A json_decode függvény segítségével a JSON formátumú adatot egy PHP tömbbé alakítjuk át. 

        foreach ($students as $studentData) {
            if (isset($studentData['d_azon']) && isset($studentData['nev']) && isset($studentData['email'])) {  //A kódrészlet azt vizsgálja, hogy az aktuális hallgató-adatok ($studentData) tartalmazzák-e a szükséges mezőket: d_azon, nev, és email. Ha bármelyik hiányzik, az adott hallgató nem kerül mentésre
                dolgozo::create([
                    'd_azon' => $studentData['d_azon'], // itt szükséges az d_azon
                    'nev' => $studentData['nev'],
                    'email' => $studentData['email'],
                ]);
            }   // Ha a feltétel teljesül, az adatokat elmentjük a dolgozo modell használatával az adatbázisba a create metódussal. A create metódus egy új rekordot hoz létre a students adatbázistáblában
        }
        

        return response()->json(['message' => 'Sikeres mentés!']);  // A metódus JSON formátumú választ küld vissza
    }
}



