<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            'nama'=>'mawar',
            'kategori_produk'=>'bunga',
            'jumlah_produk'=> 10,
            'harga_bunga'=>15000,
        ]);
    }
}