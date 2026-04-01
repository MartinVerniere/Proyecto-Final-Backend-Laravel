<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\MadurativeExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use App\Models\PostureExamination;
use App\Models\HeadExamination;
use App\Models\ShouldersExamination;
use App\Models\PelvisExamination;
use App\Models\PivotExamination;
use App\Models\KneeExamination;
use App\Models\FeetExamination;
use Illuminate\Support\Facades\DB;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberofConsultations = random_int(1, 25);
        for ($i=0; $i<$numberofConsultations;$i++){
            $consulta = Consultation::factory()->create();

            MadurativeExamination::factory()->create(['id_consulta' => $consulta->id]);
            AnthropometricalExamination::factory()->create(['id_consulta' => $consulta->id]);
            PhysicalConditionExamination::factory()->create(['id_consulta' => $consulta->id]);

			// Dont do posture examination seeder anymore, started using cloudinary for images, dont want to have examinations with no images or keypoints asociated
            // $examinacionPostura = PostureExamination::factory()->create(['id_consulta' => $consulta->id]);
        
            // HeadExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
            // ShouldersExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
            // PelvisExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
            // KneeExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
            // FeetExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
            // PivotExamination::factory()->create(['id_examinacion_postura' => $examinacionPostura->id]);
        }
    }
}
