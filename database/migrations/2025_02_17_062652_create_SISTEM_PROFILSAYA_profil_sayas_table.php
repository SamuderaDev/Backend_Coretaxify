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
        Schema::create('profil_sayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('informasi_umum_id')->nullable()->constrained();
            $table->foreignId('data_ekonomi_id')->nullable()->constrained();
            $table->foreignId('detail_bank_id')->nullable()->constrained();
            $table->foreignId('nomor_identifikasi_eksternal_id')->nullable()->constrained();
            $table->foreignId('pihak_terkait_id')->nullable()->constrained();
            $table->foreignId('tempat_kegiatan_usaha_id')->nullable()->constrained();
            $table->foreignId('detail_kontak_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sayas');
    }
};
