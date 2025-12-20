<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\AnthropometricalExaminationResource;

class AnthropometricalCollection extends ResourceCollection
{
    public function toArray($request)
    {
		$sorted = $this->collection->sortByDesc(fn($exam) => $exam->fecha_realizacion);
		return AnthropometricalExaminationResource::collection($sorted->values());
    }
}