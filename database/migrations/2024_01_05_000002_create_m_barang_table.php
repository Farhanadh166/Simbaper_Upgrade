<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel master barang/persediaan.
     * Model: App\Models\Masterbarang
     */
    public function up(): void
    {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->string('kode_barang', 16)->primary();
            $table->string('kode_sub_kelompok', 10);
            $table->string('nama_barang', 80);
            $table->string('satuan', 50);
            $table->string('featured_image')->nullable(); // path foto barang di public/foto_barang/
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
