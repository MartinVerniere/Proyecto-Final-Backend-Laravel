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

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');

            $table->enum('cervical_C4_C5', ['Hiperlordosis','Normal','Rectificado']);
            $table->enum('dorsal_D8', ['Lordotico','Normal','Cifotico']);
            $table->enum('lumbar_L3', ['Hiperlordosis','Normal','Rectificado']);
            $table->enum('raquis', ['Escoliotico','Rectificado', 'Cifolordotico']);

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
