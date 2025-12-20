<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnthropometricalCollection;
use App\Http\Resources\AnthropogenicalCollection;
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
		$anthropogenicalExaminations = $consultations->pluck('anthropogenicalExamination')->filter();
		$physicalExaminations = $consultations->pluck('physicalConditionExamination')->filter();
		$postureExaminations = $consultations->pluck('postureExamination')->filter();

		return [
			'anthropometrical_history' => (new AnthropometricalCollection($anthropometricalExaminations))->toArray($request),
			'anthropogenical_history' => (new AnthropogenicalCollection($anthropogenicalExaminations))->toArray($request),
			'physical_history' => (new PhysicalCollection($physicalExaminations))->toArray($request),
			'posture_history' =>  (new PostureCollection($postureExaminations))->toArray($request),
		];
    }
}
