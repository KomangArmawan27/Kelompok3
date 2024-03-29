<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'tabel_barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_barang',
        'stok_barang',
    ];
}
