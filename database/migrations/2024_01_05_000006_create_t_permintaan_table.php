<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel usulan permintaan barang dari pegawai.
     * Tidak terhubung ke m_barang — nama barang diisi bebas (free text).
     * Model: App\Models\Permintaan
     * penyelesaian: 0 = belum, 1 = sudah diverifikasi admin
     */
    public function up(): void
    {
        Schema::create('t_permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('kuantitas');
            $table->tinyInteger('penyelesaian')->default(0); // 0=pending, 1=selesai
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_permintaan');
    }
};
