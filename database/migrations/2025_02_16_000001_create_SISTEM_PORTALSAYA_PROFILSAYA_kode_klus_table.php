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
        Schema::create('kode_klus', function (Blueprint $table) {
            $table->id();
             
            $table->string('kode_nama')->nullable();;
            $table->string('deskripsi_klu')->nullable();;
            $table->string('deskripsi_tku')->nullable();;
            $table->date('tanggal_mulai')->nullable();;
            $table->date('tanggal_berakhir')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kode_klus');
    }
};