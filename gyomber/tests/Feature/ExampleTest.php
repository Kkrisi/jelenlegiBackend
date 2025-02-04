<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    // adatbázisba feltültünk jsont, a diákok adatait a csv fájlból
    
    // név amivel lefut: "test_it_saves_json_to_database"
    public function it_saves_json_to_database()
    {

        $jsonData = [
            'json' => json_encode([
                [
                    'nev' => 'John Elton',
                    'email' => 'johnelton@citromail.com',
                    'd_azon' => 53256,
                ]
            ])
        ];

        $response = $this->postJson('/api/save-json-to-database', $jsonData);

        $response->assertStatus(200);
    }



    


    public function it_sends_mail()
    {
        Mail::fake();

        $response = $this->get('/api/send-mail');

        $response->assertStatus(200);

    }






    use RefreshDatabase;
    
    public function test_user_can_get_munkanelkuli()
    {
        $user = User::factory()->create([
            'email' => 'felhasznalo@example.com',
            'password' => Hash::make('jelszo'),
        ]);

        $response = $this->actingAs($user, 'sanctum')
                         ->getJson('/api/munkanelkuli');

        $response->assertStatus(200);
    }

}
