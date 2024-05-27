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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan');
            $table->string('gaji');
            $table->string('tempat_kerja');
            $table->string('waktu_kerja');
            $table->string('nama_posisi');
            $table->string('ketentuan_kerja');
            $table->enum('pengalaman', ['kurang dari 1 tahun', '1-3 tahun', '3-5 tahun', '5-10 tahun','lebih dari 10 tahun']);
            $table->enum('kerja', ['penuh waktu', 'kontrak', 'magang', 'paruh waktu','harian']);
            $table->enum('tipe', ['onsite', 'remote']);
            $table->text('persyaratan');
            $table->text('jobdesk');
            $table->text('proses_wawancara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
