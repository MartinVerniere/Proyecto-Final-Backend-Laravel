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
        Schema::create('anthropogenical_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion')->constrained('examinations');

            $table->date('fecha_realizacion');
            
            $table->float('longitud_pierna');
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

            $table->float('valor_estadio_tanner');
            $table->enum('categoria_estadio_tanner', ['I','II','III','IV','V']);

            $table->float('valor_indice_madurativo');
            
            $table->float('valor_edad_PHV');
            $table->enum('categoria_PHV', ['Temprano','Normal','Tardio']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anthropogenical_examinations');
    }
};
