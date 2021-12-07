<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambahPemasukanController extends Controller
{
    //
    public function tambahPemasukan()
    {
        return view ('tambahPemasukan');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'tanggal' => 'required',
            'jumlah_pemasukan' => 'required',
            'penerima' => 'required',
        ]);

        $pemasukan = new Pemasukan();
        $pemasukan->tanggal = $request->tanggal;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->penerima = $request->penerima;
        $pemasukan->save();

        if ($pemasukan) {
            return redirect("/pemasukan")
                ->with([
                    'success' => 'Data berhasil dimasukan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data yang Anda Masukan Salah ,Mohon Periksa Kembali'
                ]);
        }
    }
}
