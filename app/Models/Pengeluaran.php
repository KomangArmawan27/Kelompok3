<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'tabel_pengeluaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'jumlah_pengeluaran',
        'penggunaan'
    ];
}
