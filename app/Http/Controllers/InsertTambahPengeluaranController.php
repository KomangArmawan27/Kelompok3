<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranInsert;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use DB;

class InsertTambahPengeluaranController extends Controller
{
    public function insertform()
    {
        return view('tambahPengeluaran');
    }

    public function insert(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $jumlah_pengeluaran = $request->input('jumlah_pengeluaran');
        $penggunaan = $request->input('penggunaan');
        $data = array('tanggal' => $tanggal, "jumlah_pengeluaran" => $jumlah_pengeluaran, "penggunaan" => $penggunaan);
        DB::table('detil_pengeluaran')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
