<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ConsultationResource;

class ConsultationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $sorted = $this->collection->sortByDesc(fn($consultation) => $consultation->getFechaUltimaExaminacionRealizada());
        return ConsultationResource::collection($sorted->values());
    }
}

