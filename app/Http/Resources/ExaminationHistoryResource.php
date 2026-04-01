<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnthropometricalCollection;
use App\Http\Resources\MadurativeCollection;
use App\Http\Resources\PhysicalCollection;
use App\Http\Resources\PostureCollection;

class ExaminationHistoryResource extends JsonResource
{
	/**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $consultations = $this->consultations;

		$anthropometricalExaminations = $consultations->pluck('anthropometricalExamination')->filter();
		$madurativeExaminations = $consultations->pluck('madurativeExamination')->filter();
		$physicalExaminations = $consultations->pluck('physicalConditionExamination')->filter();
		$postureExaminations = $consultations->pluck('postureExamination')->filter();

		return [
			'patient' => $this->nombre . " " . $this->apellido,
			'anthropometrical_history' => (new AnthropometricalCollection($anthropometricalExaminations))->toArray($request),
			'madurative_history' => (new MadurativeCollection($madurativeExaminations))->toArray($request),
			'physical_history' => (new PhysicalCollection($physicalExaminations))->toArray($request),
			'posture_history' =>  (new PostureCollection($postureExaminations))->toArray($request),
		];
    }
}
