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
        Schema::create('pivot_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations')->cascadeOnDelete();

            $table->enum('cervical', ['Lordotico','Normal','Rectificado','Cifotico']);
            $table->enum('dorsal', ['Lordotico','Normal','Rectificado','Cifotico']);
            $table->enum('lumbar', ['Lordotico','Normal','Rectificado','Cifotico']);
            $table->enum('raquis', ['Escoliotico','Rectificado']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_examinations');
    }
};
