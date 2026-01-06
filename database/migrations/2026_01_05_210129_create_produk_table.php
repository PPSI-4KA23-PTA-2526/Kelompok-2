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
        Schema::create('stok_produk', function (Blueprint $table) {
            $table->id(); // kolom id INT primary key auto increment
            $table->string('sku', 50)->unique(); // kode barang
            $table->string('nama', 100); // nama material
            $table->decimal('harga_jual', 15, 2); // harga jual (15 digit total, 2 digit desimal)
            $table->integer('stok'); // jumlah stok tersedia
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_produk');
    }
};
