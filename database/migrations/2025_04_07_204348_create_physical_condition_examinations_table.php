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
        Schema::create('physical_condition_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_consulta')->constrained('consultations')->cascadeOnDelete();

            $table->date('fecha_realizacion');

            $table->float('talla_paciente');
			$table->float('talla_paciente_sentado');
            $table->float('peso_paciente');
            $table->float('presion_arterial_maxima_paciente');
			$table->float('presion_arterial_minima_paciente');
            
            $table->float('valor_fuerza_presion_manual');
            $table->enum('categoria_fuerza_presion_manual', ['Muy bajo','Bajo','Medio','Alto','Muy alto']);

            $table->float('valor_fuerza_explosiva');
            $table->enum('categoria_fuerza_explosiva', ['Muy bajo','Bajo','Medio','Alto','Muy alto']);

            $table->float('valor_mobilidad_tobillo');
            $table->enum('categoria_mobilidad_tobillo', ['Rigidez','Bien']);
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_condition_examinations');
    }
};
