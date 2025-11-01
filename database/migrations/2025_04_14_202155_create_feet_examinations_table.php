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
        Schema::create('feet_examinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinacion_postura')->constrained('posture_examinations');

            $table->enum('eje_posterior', ['Supinador','Neutro','Pronador']);
            $table->enum('eje_anterior', ['Valgo','Neutro','Varo']);
            $table->enum('tipologia', ['Egipcio','Griego','Romano']);
            $table->enum('dedos_en_garra', ['SI','NO']);
			$table->json('keypoints');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feet_examinations');
    }
};
