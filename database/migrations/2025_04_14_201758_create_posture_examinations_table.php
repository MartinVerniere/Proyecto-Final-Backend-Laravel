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

            $table->foreignId('id_examinacion')->constrained('examinations');

            $table->date('fecha_realizacion');
            $table->string('observaciones');

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
