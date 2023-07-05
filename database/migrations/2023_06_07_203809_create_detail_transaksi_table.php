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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_transaksi');

            // $table->timestamp();
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
