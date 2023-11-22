<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function(Blueprint $table){
            $table-> id();
            $table-> String('nama');
            $table-> String('kategori_produk');
            $table-> integer('jumlah_produk');
            $table-> integer('harga_bunga');
            $table-> timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('produks');
    }
};