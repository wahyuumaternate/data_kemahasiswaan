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
       Schema::create('pendaftaran_bem', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('npm');
    $table->string('program_studi');
    $table->string('jurusan');
    $table->string('angkatan');
    $table->string('departemen');
    $table->text('alamat');
    $table->string('ktm')->nullable(); // Path file KTM
    $table->string('foto')->nullable(); // Path foto
    $table->text('alasan');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_bem');
    }
};
