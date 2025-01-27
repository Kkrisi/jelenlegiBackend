<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dolgozo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nev',
        'email',
        'szul_nev',
        'születesi_hely',
        'születesi_ido',
        'anyaja_neve',
        'taj_szam',
        'ado_szam',
        'gondviselo_nev',
        'telefonszam',
        'megjegyzes',
        'iskola_azon',
        'csoport_azon',
        'gyakhely_azon',
    ];

    public function iskola()
    {
        return $this->belongsTo(Iskola::class, 'iskola_azon');
    }

    public function csoport()
    {
        return $this->belongsTo(Csoport::class, 'csoport_azon');
    }

    public function gyakhely()
    {
        return $this->belongsTo(Gyakorlatihely::class, 'gyakhely_azon');
    }

    public static function dolgozokTobbMintEgyPdf()
    {
        return DB::table('Dolgozok as d')
            ->join('Kikuldott as k', 'd.FK_penzugy_id', '=', 'k.FK_penzugy_azon')
            ->select('d.teljes_nev', DB::raw('COUNT(k.kikuldes_azon) as kuldott_pdf_szama'))
            ->groupBy('d.teljes_nev')
            ->having('kuldott_pdf_szama', '>', 1)
            ->get();
    }

    public static function dolgozokNincsPdf()
    {
        return DB::table('Dolgozok as d')
            ->leftJoin('Kikuldott as k', 'd.FK_penzugy_id', '=', 'k.FK_penzugy_azon')
            ->select('d.teljes_nev')
            ->whereNull('k.pdf_fajinev')
            ->get();
    }

    public static function dolgozokUtolsoPdfDatum()
    {
        return DB::table('Dolgozok as d')
            ->join('Kikuldott as k', 'd.FK_penzugy_id', '=', 'k.FK_penzugy_azon')
            ->select('d.teljes_nev', DB::raw('MAX(k.kikuldes_datuma) as utolso_kuldott_datum'))
            ->groupBy('d.teljes_nev')
            ->get();
    }

    public static function dolgozokHibasanKuldottPdf()
    {
        return DB::table('Dolgozok as d')
            ->join('Hibas_kikuldott as h', 'd.FK_penzugy_id', '=', 'h.FK_penzugy_azon')
            ->select('d.teljes_nev', 'd.email_cim')
            ->get();
    }

    public static function dolgozokSzamaGyakhelyenkent()
    {
        return DB::table('Dolgozok as d')
            ->join('Gyakorlatthely as g', 'd.FK_gyakhely_azon', '=', 'g.id')
            ->select('g.cegnev', DB::raw('COUNT(d.d_azon) as dolgozok_szama'))
            ->groupBy('g.cegnev')
            ->get();
    }

    public static function dolgozokNincsEmail()
    {
        return DB::table('Dolgozok as d')
            ->select('d.teljes_nev')
            ->whereNull('d.email_cim')
            ->get();
    }

    public static function dolgozokIskolanev()
    {
        return DB::table('Dolgozok as d')
            ->join('Iskola as i', 'd.FK_iskola_azon', '=', 'i.id')
            ->select('d.teljes_nev', 'i.iskolanev')
            ->get();
    }

    public static function dolgozokCimeGyakhelyVarosban()
    {
        return DB::table('Dolgozok as d')
            ->join('Cimek as c', 'd.d_azon', '=', 'c.d_azon')
            ->join('Gyakorlatthely as g', 'd.FK_gyakhely_azon', '=', 'g.id')
            ->select('d.teljes_nev', 'c.telepules_alando', 'g.cegnev')
            ->whereColumn('c.telepules_alando', 'g.telepules')
            ->get();
    }

    public static function dolgozokTobbGyakhely()
    {
        return DB::table('Dolgozok as d')
            ->join('Gyakorlatthely as g', 'd.FK_gyakhely_azon', '=', 'g.id')
            ->select('d.teljes_nev', DB::raw('COUNT(g.id) as gyakorlati_helyek_szama'))
            ->groupBy('d.teljes_nev')
            ->having('gyakorlati_helyek_szama', '>', 1)
            ->get();
    }

    public static function dolgozokNincsTaj()
    {
        return DB::table('Dolgozok as d')
            ->select('d.teljes_nev')
            ->whereNull('d.taj_szam')
            ->get();
    }
}
