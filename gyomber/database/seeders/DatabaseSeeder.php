<?php

namespace Database\Seeders;

use App\Models\felhasznalo;
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

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        Felhasznalo::create([
            'email' => 'admin@gmail.com',
            'jelszo' => Hash::make('adminpassword'), // Titkosított jelszó
            'nev' => 'Admin User',
            'jogosultsag_azon' => 3, // Admin jogosultság
        ]);
    
        Felhasznalo::create([
            'email' => 'user@gmail.com',
            'jelszo' => Hash::make('securepassword'),
            'nev' => 'Test User',
            // A 'jogosultsag_azon' mező itt kihagyható, mert alapértelmezetten 1 lesz
            //'jogosultsag_azon' => 1, // Karbantartó jogosultság
        ]);
    }
}
