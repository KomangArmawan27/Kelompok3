<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class UserBarangController extends Controller
{
    //
    public function userBarang()
    {
        $userBarang = Barang::all();
        return view('/user', compact('userBarang'));
    }
}
