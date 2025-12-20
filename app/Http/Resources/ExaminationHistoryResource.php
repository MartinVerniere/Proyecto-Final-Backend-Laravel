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

		return [
			'anthropometrical_history' => new AnthropometricalCollection($consultations->pluck('anthropometricalExamination')->filter()),
			'anthropogenical_history' => new AnthropogenicalCollection($consultations->pluck('anthropogenicalExamination')->filter()),
			'physical_history' => new PhysicalCollection($consultations->pluck('physicalConditionExamination')->filter()),
			'posture_history' =>  new PostureCollection($consultations->pluck('postureExamination')->filter()),
		];
    }
}
