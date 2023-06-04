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
        Schema::create('datakeretas', function (Blueprint $table) {
            $table->id_kereta();
            $table->string('nama_kereta');
            $table->string('kelas');
            $table->string('kuota_kereta');
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
        Schema::dropIfExists('datakeretas');
    }
};
