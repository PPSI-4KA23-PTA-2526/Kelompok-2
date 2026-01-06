<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis pakai 'transaksis')
    protected $table = 'transaksis';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'nama_customer',
        'metode_pembayaran',
        'total',
        'tanggal',
        'catatan',
    ];

    // Casting tipe data agar lebih mudah dipakai
    protected $casts = [
        'total' => 'decimal:2',
        'tanggal' => 'date',
    ];
}
