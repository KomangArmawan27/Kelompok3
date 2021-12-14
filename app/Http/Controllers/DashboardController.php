<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class DashboardController extends Controller
{
    public function admin()
    {
        if (Auth::check(1)) {
            return view('admin');
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function user()
    {
        if (Auth::check(0)) {
            return view('user');
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function data()
    {
        $pengeluaran = Pengeluaran::all();
        $pemasukan = Pemasukan::all();
        $barang = Barang::all();
        if(Auth::user()->admin == 1){
        return view('admin', compact('pengeluaran', 'pemasukan'));
        } else{
            return view('user');
        }
    }
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:B1');
        $sheet->setCellValue('A1', 'Pemasukkan');
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Tanggal');
        $sheet->setCellValue('C2', 'Jumlah');
        $sheet->setCellValue('D2', 'Penerima');
        $sheet->mergeCells('F1:G1');
        $sheet->setCellValue('F1', 'Pengeluaran');
        $sheet->setCellValue('F2', 'No');
        $sheet->setCellValue('D2', 'Tanggal');
        $sheet->setCellValue('D2', 'Jumlah');
        $sheet->setCellValue('D2', 'Penggunaan');
        $koneksi = mysqli_connect('localhost', 'root', '', 'kopma');
        $query = mysqli_query($koneksi,"select * from tabel_pemasukan
                                        join tabel_pengeluaran on tabel_pengeluaran.id = tabel_pemasukan.id ");
        $i = 2;
        $no = 1;
        while($row = mysqli_fetch_array($query))
        {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $row['tanggal']);
            $sheet->setCellValue('C'.$i, $row['jumlah_pemasukan']);
            $sheet->setCellValue('D'.$i, $row['penerima']);
            $sheet->setCellValue('F'.$i, $no++);
            $sheet->setCellValue('G'.$i, $row['tanggal']);
            $sheet->setCellValue('H'.$i, $row['jumlah_pengeluaran']);
            $sheet->setCellValue('I'.$i, $row['penggunaan']);
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('ReportPemasukan_Pengeluaran.xlsx');
        $pengeluaran = Pengeluaran::all();
        $pemasukan = Pemasukan::all();
        $barang = Barang::all();
        if(Auth::user()->admin == 1){
        return view('admin', compact('pengeluaran', 'pemasukan'));
        } else{
            return view('user');
        }
    }
}
