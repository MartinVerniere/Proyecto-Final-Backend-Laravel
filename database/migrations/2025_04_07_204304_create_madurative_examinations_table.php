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
        Schema::create('madurative_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_consulta')->constrained('consultations')->cascadeOnDelete();

            $table->date('fecha_realizacion');

            $table->float('talla_paciente');
			$table->float('talla_paciente_sentado');
            $table->float('peso_paciente');
            $table->float('presion_arterial_maxima_paciente');
			$table->float('presion_arterial_minima_paciente');

            $table->float('longitud_pierna');

			$table->enum('categoria_nivel_de_actividad', ['Sedentaria','Liviana','Moderada','Intensa','Extremada']);
			$table->float('valor_nivel_de_actividad');
            $table->float('valor_EER');

			$table->float('tasa_metabolica_basal');
            $table->float('gasto_energetico_total_estimado');

            $table->float('talla_padre');
            $table->float('talla_madre');

            $table->float('talla_adulta');
            $table->float('talla_objetiva_genetica');
            $table->float('talla_falta_crecer');

            $table->float('valor_IRMI');
            $table->enum('categoria_IRMI', ['0','1','2']);

            $table->float('valor_indice_cormico');
            $table->enum('categoria_indice_cormico', ['Corto','Medio','Largo']);

            $table->float('valor_indice_masa_corporal');
            $table->enum('categoria_indice_masa_corporal', ['Peso insuficiente','Normopeso','Sobrepeso tipo I','Sobrepeso tipo II','Obesidad tipo I','Obesidad tipo II','Obesidad tipo III']);

            $table->enum('estadio_tanner', ['I','II','III','IV','V']);
            $table->float('valor_indice_madurativo');
            $table->float('valor_edad_PHV');
            $table->enum('categoria_edad_PHV', ['Temprano','Normal','Tardio']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('madurative_examinations');
    }
};
