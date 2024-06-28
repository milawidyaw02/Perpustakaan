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
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('tgl_lahir');
            $table->string('tgl_bergabung');
            $table->string('status_anggota');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_anggota');
    }
};