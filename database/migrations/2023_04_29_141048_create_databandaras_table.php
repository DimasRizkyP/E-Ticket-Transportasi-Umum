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
        Schema::create('databandaras', function (Blueprint $table) {
            $table->id_bandara();
            $table->string('nama_bandara');
            $table->string('kota');
            $table->string('negara');
            $table->softDdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databandaras');
    }
};
