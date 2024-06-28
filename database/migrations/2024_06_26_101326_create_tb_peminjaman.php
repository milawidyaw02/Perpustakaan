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
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_buku');
            $table->string('tgl_pinjam');
            $table->string('tgl_jatuh_tempo');
            $table->string('tgl_kembali');
            $table->timestamps();
            
            $table->foreign('id_anggota')->references('id')->on('tb_anggota')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('tb_buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peminjaman');
    }
};