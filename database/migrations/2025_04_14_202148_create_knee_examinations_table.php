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
        Schema::create('knee_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');

            $table->enum('genu', ['Varo','Valgo','Recurbatum','Flexo','Normal']);
            $table->enum('morfotipo_torsional', ['SI','NO']);
            $table->enum('tipologia_rotulas', ['Convexa','Normal','Divergente']);
			$table->json('keypoints');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knee_examinations');
    }
};
