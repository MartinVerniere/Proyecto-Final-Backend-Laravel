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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->foreignId('id_paciente')->constrained('patients');
            $table->date('fecha_realizacion');
            $table->float('talla');
			$table->float('talla_sentado');
            $table->float('peso');
            $table->float('presion_arterial');

            $table->string('deporte')->nullable();
            $table->integer('horas_gimnasio')->nullable();
            $table->integer('dias_gimnasio')->nullable();
            $table->integer('horas_semana_gimnasio')->nullable();
            $table->integer('horas_entrenamiento')->nullable();
            $table->integer('dias_entrenamiento')->nullable();
            $table->integer('horas_semana_entrenamiento')->nullable();
            $table->string('club')->nullable();
            $table->string('posicion')->nullable();
            $table->text('antecedentes_personales')->nullable();
            $table->text('antecedentes_familiares')->nullable();
            $table->text('antecedentes_lesiones')->nullable();
            $table->text('estudios_laboratorio')->nullable();
            $table->string('observaciones_estudios_laboratorio')->nullable();
            $table->text('estudios_cardiologicos')->nullable();
            $table->string('observaciones_estudios_cardiologicos')->nullable();
            $table->boolean('desayuna')->nullable();
            $table->boolean('almuerza')->nullable();
            $table->boolean('merienda')->nullable();
            $table->boolean('cena')->nullable();
            $table->float('hidratacion')->nullable();
            $table->text('anotaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
