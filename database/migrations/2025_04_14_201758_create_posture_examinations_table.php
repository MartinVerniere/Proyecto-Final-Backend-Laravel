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
        Schema::create('posture_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_consulta')->constrained('consultations');

            $table->date('fecha_realizacion');
			
            $table->float('talla_paciente');
			$table->float('talla_paciente_sentado');
            $table->float('peso_paciente');
            $table->float('presion_arterial_paciente');

            $table->string('observaciones');
			
			$table->string('imagen_frontal')->nullable();
			$table->string('imagen_lateral_derecha')->nullable();
			$table->string('imagen_lateral_izquierda')->nullable();
			$table->string('imagen_trasera')->nullable();

			$table->json('keypoints_frontal');
			$table->json('keypoints_lateral_derecha');
			$table->json('keypoints_lateral_izquierda');
			$table->json('keypoints_trasera');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posture_examinations');
    }
};
