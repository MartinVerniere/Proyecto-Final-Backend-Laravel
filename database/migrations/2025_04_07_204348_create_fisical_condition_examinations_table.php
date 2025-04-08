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
        Schema::create('fisical_condition_examinations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('examination_id')->constrained('examinations');
            
            $table->float('valor_fuerza_presion_manual');
            $table->enum('categoria_fuerza_presion_manual', ['']);

            $table->float('valor_fuerza_explosiva');
            $table->enum('categoria_fuerza_explosiva', ['']);

            $table->float('valor_mobilidad_tobillo');
            $table->enum('categoria_mobilidad_tobillo', ['']);

            $table->IMAGEN('evaluacion_sentadillas');
            $table->IMAGEN('evaluacion_activa_pierna');
            $table->IMAGEN('movilidad_hombros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisical_condition_examinations');
    }
};
