<?php

namespace App\Http\Resources\DocumentType;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class DocumentTypeIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name'       => $this->name,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y H:i:s')
        ];
    }
}
