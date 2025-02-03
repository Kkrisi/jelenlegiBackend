<?php

namespace Database\Seeders;

use App\Models\felhasznalo;
use App\Models\jogosultsag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        

        // Ezután szúrj be felhasználókat
         User::create([
             'email' => 'admin@gmail.com',
             'password' => Hash::make('adminpassword'),
             'name' => 'Admin User',
             'jogosultsag_azon' => 2,
         ]);
         
        
        
         User::create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('securepassword'),
            'name' => 'Test User',
            'jogosultsag_azon' => 1,
        ]);


        /*
        iskola::create([
            'nev' => 'Példa Iskola', // A cég neve itt szerepel
            'web_oldal' => 'http://www.peldaiskola.hu',
            'kapcsolat_tarto' => 'Nagy Anna', // Kapcsolattartó neve
        ]);
        
        // Gyakorlatihely adat létrehozása
        gyakorlatihely::create([
            'ceg_nev' => 'Példa Cég', // A cég neve itt szerepel
            'web_oldal' => 'http://www.peldaceg.hu',
            'kapcsolat_tarto' => 'Kiss Péter', // Kapcsolattartó neve
            'telefonszam' => '06201234567', // Telefonszám
        ]);
        */
        

        /*
        // Példa dolgozó létrehozása
        dolgozo::create([
            'nev' => 'Kovács Péter',
            'email' => 'kovacs.peter@example.com',
            'szul_nev' => 'Kovács Anna',
            'születesi_hely' => 'Budapest',
            'születesi_ido' => '1990-01-01',
            'anyaja_neve' => 'Kovács Mária',
            'taj_szam' => '123456789',
            'ado_szam' => '987654321',
            'gondviselo_nev' => 'Kovács István',
            'telefonszam' => '06201234567',
            'megjegyzes' => 'Ez egy példa dolgozó.',
            'iskola_azon' => 1, // Az `iskola` tábla id-ja
            'gyakhely_azon' => 1, // A `gyakorlatihely` tábla id-ja
        ]);  */

    }
}
