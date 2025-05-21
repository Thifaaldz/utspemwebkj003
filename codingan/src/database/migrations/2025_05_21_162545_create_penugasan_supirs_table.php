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
        Schema::create('penugasan_supirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supir_id')->constrained()->onDelete('cascade');
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_penugasan');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_supirs');
    }
};
