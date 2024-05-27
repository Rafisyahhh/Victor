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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lowongan');
            $table->foreignId('id_user');
            $table->foreignId('id_cv');
            $table->foreignId('id_pengalaman');
            $table->foreignId('id_keahlian');
            $table->foreignId('id_pendidikan');
            $table->enum('status', ['pending', 'accept','reject'])->default('pending');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
