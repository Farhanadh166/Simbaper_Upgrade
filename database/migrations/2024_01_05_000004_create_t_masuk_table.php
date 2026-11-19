<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel log transaksi barang masuk.
     * Model: App\Models\Transaksimasuk
     */
    public function up(): void
    {
        Schema::create('t_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_bon', 10)->nullable();  // nullable sesuai commit terakhir
            $table->string('kode_barang', 16);
            $table->integer('harga')->nullable();       // nullable sesuai commit terakhir
            $table->integer('kuantitas');
            $table->date('tgl_masuk');
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('kode_barang')
                  ->references('kode_barang')
                  ->on('m_barang')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_masuk');
    }
};
