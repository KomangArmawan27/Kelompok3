<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PengeluaranController extends Controller
{
    // view pengeluaran
    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::all();
        return view('/pengeluaran', compact('pengeluaran'));
    }

    // view tambah pengeluaran
    public function tambahPengeluaran()
    {
        return view('tambahPengeluaran');
    }

    // fungsi tambah pengeluaran
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

    // view edit pengeluaran
    public function editPengeluaran($id)
    {
        $editPengeluaran = ['id' => Pengeluaran::findOrFail($id)];
        return view('/editPengeluaran', compact('editPengeluaran'));
    }

    // fungsi update pengeluaran
    public function update(Request $request)
    {
        DB::table('tabel_pengeluaran')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'penggunaan' => $request->penggunaan
        ]);
        return redirect("/pengeluaran");
    }

    // hapus data
    public function hapusPengeluaran($id)
    {
        $hapusPemasukan = DB::table('tabel_pengeluaran')->where('id', $id)->delete();
        return redirect("/pengeluaran");
    }
}
