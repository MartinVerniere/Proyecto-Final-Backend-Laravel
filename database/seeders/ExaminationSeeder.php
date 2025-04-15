<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Examination;
use App\Models\AnthropogenicalExamination;
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

class ExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberofExaminations = random_int(1, 25);
        for ($i=0; $i<$numberofExaminations;$i++){
            Examination::factory()->count(1)->create();

            $idLastExamination = DB::getPdo()->lastInsertId();
            AnthropogenicalExamination::factory()->count(1)->create(['id_examinacion'=>$idLastExamination]);
            AnthropometricalExamination::factory()->count(1)->create(['id_examinacion'=>$idLastExamination]);
            PhysicalConditionExamination::factory()->count(1)->create(['id_examinacion'=>$idLastExamination]);
            PostureExamination::factory()->count(1)->create(['id_examinacion'=>$idLastExamination]);

            $idLastPostureExamination = DB::getPdo()->lastInsertId();
            HeadExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
            ShouldersExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
            PelvisExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
            KneeExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
            FeetExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
            PivotExamination::factory()->count(1)->create(['id_examinacion_postura'=>$idLastPostureExamination]);
        }
    }
}
