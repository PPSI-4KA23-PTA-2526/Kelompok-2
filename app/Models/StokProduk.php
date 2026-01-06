<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProduk extends Model
{
    use HasFactory;

    protected $table = 'stok_produk';

    protected $fillable = [
        'sku',
        'nama',
        'harga_jual',
        'stok',
    ];
}
