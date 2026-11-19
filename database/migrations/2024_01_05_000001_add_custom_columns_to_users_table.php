<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom custom ke tabel users yang sudah ada.
     * Kolom ini tidak ada di migration bawaan Laravel/Jetstream.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname', 70)->after('id');
            $table->string('username', 255)->after('fullname');
            $table->string('nip', 18)->after('username');
            $table->string('organisasi', 70)->after('nip');
            $table->string('unit_kerja', 60)->after('organisasi');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fullname', 'username', 'nip', 'organisasi', 'unit_kerja']);
        });
    }
};
