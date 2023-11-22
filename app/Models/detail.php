<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id',
        'pesanan_id',
        'jumlah',
        'jumlah_harga'
    ];
}
