<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambahPengeluaranController extends Controller
{
    //
    public function tambahPengeluaran()
    {
        return view ('tambahPengeluaran');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'tanggal' => 'required',
            'jumlah_pengeluaran' => 'required',
            'penggunaan' => 'required',
        ]);

        $pengeluaran = new Pengeluaran();
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->penggunaan = $request->penggunaan;
        $pengeluaran->save();

        if ($pengeluaran) {
            return redirect("/pengeluaran")
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
