<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class felhasznalo extends Model
{
    use HasFactory;

    protected $primaryKey = 'f_azon';

    protected $fillable = ['felhas_nev', 'jelszo', 'nev', 'jogosultsag_azon', 'csoport_azon'];



    
    // Kapcsolatok

    // Felhasználóhoz tartozó jogosultság
    public function jogosultsag()
    {
        return $this->belongsTo(Jogosultsag::class, 'jogosultsag_azon', 'jog_azon');
    }

    // Felhasználóhoz tartozó csoport
    public function csoport()
    {
        return $this->belongsTo(Csoport::class, 'csoport_azon', 'csop_azon');
    }
}
