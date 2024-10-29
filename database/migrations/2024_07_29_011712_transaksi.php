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
        Schema::create('transaksi', function (Blueprint $table) {
            // $table->id();
            $table->char('id_transaksi')-> primary();
            $table->unsignedBigInteger('id_user');
            $table->char('id_produk');
            // $table->integer('qty');
            // $table->bigInteger('price');
            $table->string('status');
            // $table->string('no_hp');
            $table->bigInteger('total');
            $table->timestamps();

            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
