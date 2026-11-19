<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel log transaksi barang keluar / pemakaian.
     * Model: App\Models\Transaksikeluar
     * Kolom pemakai = FK ke users.id (siapa yang memakai)
     */
    public function up(): void
    {
        Schema::create('t_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 16);
            $table->integer('kuantitas');
            $table->date('tgl_keluar');
            $table->unsignedBigInteger('pemakai'); // FK ke users.id
            $table->timestamps();

            $table->foreign('kode_barang')
                  ->references('kode_barang')
                  ->on('m_barang')
                  ->onDelete('restrict');

            $table->foreign('pemakai')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');

            // Index untuk query kwitansi yang sering filter per tanggal & pemakai
            $table->index(['tgl_keluar', 'pemakai']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_keluar');
    }
};
