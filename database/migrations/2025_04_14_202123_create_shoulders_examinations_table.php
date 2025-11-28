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
        Schema::create('shoulders_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');
            
            $table->enum('inclinacion', ['Inclinacion derecha','Normal','Inclinacion izquierda']);
            $table->enum('escapula', ['Rotacion medial','Rotacion lateral','Aladas','Alineadas']);
            $table->enum('hombro', ['Antepulsion','Normal','Retropulsion']);
            //$table->enum('triangulo_de_talle', ['Normal','Aumentado']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoulders_examinations');
    }
};
