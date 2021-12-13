<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //
    public function barang()
    {
        $barang = Barang::all();
        return view('/barang', compact('barang'));
    }

    // view edit stok
    public function editStok($id)
    {
        $editStok = ['id' => Barang::findOrFail($id)];
        return view('/editStok', compact('editStok'));
    }

    // update stok 
    public function update(Request $request)
    {
        DB::table('tabel_barang')->where('id', $request->id)->update([
            'stok_barang' => $request->stok_barang
        ]);
        return redirect("/barang");
    }
}
