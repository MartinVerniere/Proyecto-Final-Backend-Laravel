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
        Schema::create('head_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');
            
            $table->enum('plano', ['Adelantado','Neutro','Retrasado']);
            $table->enum('inclinacion', ['SI','NO']);
            $table->enum('mirada', ['Inclinacion derecha','Normal','Inclinacion izquierda']);
			$table->json('keypoints');
			$table->string("imagen");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_examinations');
    }
};
