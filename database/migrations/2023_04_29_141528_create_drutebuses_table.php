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
        Schema::create('drutebuses', function (Blueprint $table) {
            $table->id_rute_bus();
            $table->foreignId('id_terminal_asal')->constrained('terminal')->onUpdate('cascade')->onDelete
            ('cascade');
            $table->foreignId('id_terminal_tujuan')->constrained('terminal')->onUpdate('cascade')->onDelete
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
        Schema::dropIfExists('drutebuses');
    }
};
