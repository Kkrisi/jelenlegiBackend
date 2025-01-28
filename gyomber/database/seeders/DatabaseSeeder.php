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

      

        
        jogosultsag::create([
            'jog_azon' => 1,
            'megnevezes' => 'user', // Alapértelmezett felhasználói jogosultság
        ]);

        // Először szúrd be a szükséges jogosultságot a jogosultsags táblába
        jogosultsag::create([
            'jog_azon' => 2,
            'megnevezes' => 'superadmin',
        ]);
        
         
        
        
        

        
        // Ezután szúrj be felhasználókat
         User::create([
             'email' => 'admin@gmail.com',
             'password' => Hash::make('adminpassword'),
             'name' => 'Admin User',
             'jogosultsag_azon' => 2, // Hivatkozás a 'ssuperadmin' jogosultságra
         ]);
         
        
        
         User::create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('securepassword'),
            'name' => 'Test User',
            'jogosultsag_azon' => 1, // Ha nem adsz meg jogosultságot, alapértelmezett lesz (felhasználó)
        ]);

    }
}
