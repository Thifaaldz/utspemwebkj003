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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi')->unique();
            $table->string('merek');
            $table->string('tipe');
            $table->string('tahun_kendaraan');
            $table->string('warna');
            $table->string('status_kepemilikan'); 
            $table->date('masa_berlaku_stnk');
            $table->date('masa_berlaku_kir')->nullable();
            $table->string('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
