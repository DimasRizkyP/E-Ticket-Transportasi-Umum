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
        Schema::create('drutepesawats', function (Blueprint $table) {
            $table->id_rute_pesawat();
            $table->foreignId('id_bandara_asal')->constrained('bandara')->onUpdate('cascade')->onDelete
            ('cascade');
            $table->foreignId('id_bandara_tujuan')->constrained('bandara')->onUpdate('cascade')->onDelete
            ('cascade');
            $table->string('detail_status');
            $table->softDdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drutepesawats');
    }
};
