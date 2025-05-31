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
        Schema::create('pengurus_bem', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('nama')->nullable();
            $table->string('npm')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('departemen')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_bem');
    }
};
