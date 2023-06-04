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
        Schema::create('dataterminals', function (Blueprint $table) {
            $table->id_terminal();
            $table->string('nama_terminal');
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
        Schema::dropIfExists('dataterminals');
    }
};
