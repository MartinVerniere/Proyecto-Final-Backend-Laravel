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
        Schema::create('pelvis_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');
            
            $table->enum('eias', ['Inclinacion izquierda','Normal','Inclinacion derecha']);
            $table->enum('eips', ['Inclinacion izquierda','Normal','Inclinacion derecha']);
            $table->enum('relacion', ['Anteversion','Neutra','Retroversion']);
            $table->enum('rotacion', ['Izquierda','Neutra','Derecha']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelvis_examinations');
    }
};
