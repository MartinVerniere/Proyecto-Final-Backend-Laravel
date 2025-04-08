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
            $table->timestamps();

            $table->foreignId('examination_id')->constrained('examinations');
            
            $table->float('longitud_pierna');
            $table->float('talla_padre');
            $table->float('talla_madre');

            $table->float('talla_adulta');
            $table->float('talla_objetiva_genetica');
            $table->float('talla_falta_crecer');

            $table->float('valor_IRMI');
            $table->enum('categoria_IRMI', ['']);

            $table->float('valor_indice_cormico');
            $table->enum('categoria_indice_cormico', ['']);

            $table->float('valor_indice_masa_corporal');
            $table->enum('categoria_indice_masa_corporal', ['']);

            $table->float('valor_estadio_tanner');
            $table->enum('categoria_estadio_tanner', ['']);

            $table->float('valor_PHV');
            $table->enum('categoria_PHV', ['']);
            
            $table->float('valor_edad_PHV');
            $table->enum('categoria_edad_PHV', ['']);
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
