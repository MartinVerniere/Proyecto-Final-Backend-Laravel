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
        Schema::create('anthropometrical_examinations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('examination_id')->constrained('examinations');

            $table->integer('pliegues_triceps');
            $table->integer('pliegues_subescapular');
            $table->integer('pliegues_supraespinal');
            $table->integer('pliegues_abdominal');
            $table->integer('pliegues_muslo');
            $table->integer('pliegues_pantorrilla');

            $table->float('perimetro_brazo_relajado');
            $table->float('perimetro_brazo_flexionado');
            $table->float('perimetro_cintura_minima');
            $table->float('perimetro_cadera');
            $table->float('perimetro_muslo');
            $table->float('perimetro_pantorrilla');

            $table->float('valor_indice_cintura_cadera');
            $table->enum('categoria_indice_cintura_cadera', ['Bajo','Moderado','Alto','Muy alto']);

            $table->float('valor_indice_masa_grasa');
            $table->enum('categoria_indice_masa_grasa', ['Muy bajo','Bajo','Medio','Alto','Muy alto']);

            $table->float('valor_indice_masa_muscular');
            $table->enum('categoria_indice_masa_muscular', ['Bajo','Moderado','Alto']);

            $table->integer('suma_pliegues');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anthropometrical_examinations');
    }
};
