<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $query = DB::table('users')->get();
        return $query;
    }
    //*TODO loginra is ide valamit*//
    public function register()
    {
        
    }
}
