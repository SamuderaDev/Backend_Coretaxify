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
        Schema::create('detail_banks', function (Blueprint $table) {
            $table->id();

            $table->string('nama_bank')->nullable();
            $table->string('nama_pemilik_bank')->nullable();
            $table->string('nomor_rekening_bank')->nullable();
            $table->string('jenis_rekening_bank')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_banks');
    }
};
