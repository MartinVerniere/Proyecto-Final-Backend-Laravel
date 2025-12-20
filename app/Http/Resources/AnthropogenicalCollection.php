<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\AnthropogenicalExaminationResource;

class AnthropogenicalCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sorted = $this->collection->sortByDesc(fn($exam) => $exam->fecha_realizacion);

        return AnthropogenicalExaminationResource::collection($sorted->values());
    }
}
