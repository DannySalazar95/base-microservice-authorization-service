<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'first_name'       => $this->first_name,
            'father_last_name' => $this->father_last_name,
            'mother_last_name' => $this->mother_last_name,
            'document_number'  => $this->document_number,
            'document_type'    => $this->document_type,
            'birth_of_date'    => $this->birth_of_date,
            'email'            => $this->email
        ];
    }
}
