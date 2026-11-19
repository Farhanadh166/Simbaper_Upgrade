<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel stok on-hand (buku besar persediaan).
     * Dibuat setelah m_barang karena FK ke kode_barang.
     * Model: App\Models\Opname
     */
    public function up(): void
    {
        Schema::create('t_stock', function (Blueprint $table) {
            $table->string('kode_barang', 16)->primary();
            $table->integer('quantity')->default(0);
            $table->integer('quantity_opname')->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('kode_barang')
                  ->references('kode_barang')
                  ->on('m_barang')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_stock');
    }
};
