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
        Schema::create('informasi_tambahans', function (Blueprint $table) {
            $table->id();
            $table->string('informasi_tambahan');
            $table->string('kode');
            $table->string('keterangan');
            $table->string('cap_fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_tambahans');
    }
};
