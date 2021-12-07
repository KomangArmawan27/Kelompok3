<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    //
    
    public function pemasukan()
    {
        $pemasukan = Pemasukan::all();
        return view('/pemasukan', compact('pemasukan'));
    }
}
