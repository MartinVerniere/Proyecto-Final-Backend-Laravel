<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Examination;
use App\Models\AnthropogenicalExamination;
use App\Models\AnthropometricalExamination;
use App\Models\PhysicalConditionExamination;
use Illuminate\Support\Facades\DB;

class ExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i<15;$i++){
            Examination::factory()->count(1)->create();
            $idLastExamination = DB::getPdo()->lastInsertId();
            AnthropogenicalExamination::factory()->count(1)->create(['examination_id'=>$idLastExamination]);
            AnthropometricalExamination::factory()->count(1)->create(['examination_id'=>$idLastExamination]);
            PhysicalConditionExamination::factory()->count(1)->create(['examination_id'=>$idLastExamination]);
        }
    }
}
