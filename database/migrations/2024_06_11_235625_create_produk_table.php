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
        Schema::create('produk', function (Blueprint $table) {
            // $table->id();
            $table->char('id_produk')->primary();
            $table->string('email');
            $table->string('password');
            $table->string('nama_produk');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->bigInteger('diskon');
            $table->bigInteger('harga_akhir');
            $table->string('foto');
            // $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
