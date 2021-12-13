<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTabelBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('stok_barang');
            $table->timestamps();
        });

        DB::table('tabel_barang')->insert(
            array(
                ['nama_barang' => 'Amplop',
                'stok_barang' => 0],
                ['nama_barang' => 'Ballpoint Quantum',
                'stok_barang' => 0],
                ['nama_barang' => 'Ballpoint Standart',
                'stok_barang' => 0],
                ['nama_barang' => 'CD-R GT-PRO',
                'stok_barang' => 0],
                ['nama_barang' => 'DVD Case',
                'stok_barang' => 0],
                ['nama_barang' => 'DVD-RW GT-PRO',
                'stok_barang' => 0],
                ['nama_barang' => 'Kertas A4 70gr',
                'stok_barang' => 0],
                ['nama_barang' => 'Kuitansi KT 40 Sinar Dunia',
                'stok_barang' => 0]
            )
        );
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_barang');
    }
}
