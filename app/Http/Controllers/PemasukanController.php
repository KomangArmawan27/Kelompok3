<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemasukanController extends Controller
{
    //
    // view pemasukan
    public function pemasukan()
    {
        $pemasukan = Pemasukan::all();
        return view('/pemasukan', compact('pemasukan'));
    }

    // view tambah pemasukan
    public function tambahPemasukan()
    {
        return view('tambahPemasukan');
    }

    // fungsi tambah data
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

    // view edit pemasukan
    public function editPemasukan($id)
    {
        $editPemasukan = ['id' => Pemasukan::findOrFail($id)];
        return view('/editPemasukan', compact('editPemasukan'));
    }

    // fungsi update pemasukan
    public function update(Request $request)
    {
        DB::table('tabel_pemasukan')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'jumlah_pemasukan' => $request->jumlah_pemasukan,
            'penerima' => $request->penerima
        ]);
        return redirect("/pemasukan");
    }

    // hapus data
    public function hapusPemasukan($id)
    {
        $hapusPemasukan = DB::table('tabel_pemasukan')->where('id', $id)->delete();
        return redirect("/pemasukan");
    }
}
