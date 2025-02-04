<?php

namespace App\Http\Controllers;

use App\Models\gyakorlatihely;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DolgozokController extends Controller
{
    public function index()
    {
        $query = DB::table('dolgozos')->get();
        return $query;
    }

    public function DolgozosIdSzerint($id)
     {
        $query = DB::table('dolgozos')
            -> select('*')
            -> where('d_azon', '=' ,$id)
            ->get();
            return $query;
     }

    public function getDolgozoskTobbMintEgyKuldottPdf()
    {
        $query = DB::table('dolgozos as d')
            ->join('kikuldott as k', 'd.d_azon', '=', 'k.penzugy_azon')
            ->select('d.nev', DB::raw('COUNT(k.kuldott_azon) as kuldott_pdf_szama'))
            ->groupBy('d.nev')
            ->having('kuldott_pdf_szama', '>', 1)
            ->get();

        return $query;
    }

    public function getDolgozoskUtolsoKuldottPdfDatum()
    {
        $query = DB::table('dolgozos as d')
            ->join('kikuldott as k', 'd.d_azon', '=', 'k.penzugy_azon')
            ->select('d.nev', DB::raw('MAX(k.kuldes_datuma) as utolso_kuldott_datum'))
            ->groupBy('d.nev')
            ->get();

        return $query;
    }

    public function getDolgozoskSzamaGyakorlatiHelyenkent()
    {
        $query = DB::table('dolgozos as d')
            ->join('gyakorlatihely as g', 'd.gyakhely_azon', '=', 'g.gyak_azon')
            ->select('g.ceg_new', DB::raw('COUNT(d.d_azon) as dolgozosk_szama'))
            ->groupBy('g.ceg_new')
            ->get();

        return $query;
    }

    public function getDolgozoskTobbMintEgyGyakorlatiHely()
    {
        $query = DB::table('dolgozos as d')
            ->join('gyakorlatihely as g', 'd.gyakhely_azon', '=', 'g.gyak_azon')
            ->select('d.nev', DB::raw('COUNT(g.gyak_azon) as gyakorlati_helyek_szama'))
            ->groupBy('d.nev')
            ->having('gyakorlati_helyek_szama', '>', 1)
            ->get();

        return $query;
    }

    public function getDolgozoskEsIskolajuk()
    {
        $query = DB::table('dolgozos as d')
            ->join('iskola as i', 'd.iskola_azon', '=', 'i.isk_azon')
            ->select('d.nev', 'i.nev as iskolanev')
            ->get();

        return $query;
    }
    public function nincsCeg()
    {
        $query = DB::table('dolgozos as d')
        ->whereNull('gyakhely_azon')
        ->select('d.nev')
        ->get();
        return $query;
    }

    public function adminTeszt()
    {
        $query = DB::table('users')->get();
        return $query;
    }


}