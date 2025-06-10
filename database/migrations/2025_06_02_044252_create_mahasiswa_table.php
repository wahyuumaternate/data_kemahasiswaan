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
       Schema::create('mahasiswa', function (Blueprint $table) {
    $table->id();
    $table->string('npm', 20)->unique();
    $table->string('nama', 100);
    $table->string('jurusan', 100);
    $table->year('angkatan');
    $table->longText('kegiatan_diikuti')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
