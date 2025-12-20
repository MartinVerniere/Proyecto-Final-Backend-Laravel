<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\PhysicalConditionExaminationResource;

class PhysicalCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
		$sorted = $this->collection->sortByDesc(fn($exam) => $exam->fecha_realizacion);
	
		return PhysicalConditionExaminationResource::collection($sorted->values());
    }
}
