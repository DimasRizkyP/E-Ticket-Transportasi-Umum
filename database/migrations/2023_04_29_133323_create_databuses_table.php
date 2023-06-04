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
        Schema::create('databuses', function (Blueprint $table) {
            $table->id_bus();
            $table->string('nama_bus');
            $table->string('kelas');
            $table->string('kuota');
            $table->string('perusahaan');
            $table->softDdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databuses');
    }
};
