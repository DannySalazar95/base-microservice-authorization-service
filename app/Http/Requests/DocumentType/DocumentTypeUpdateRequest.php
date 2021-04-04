<?php

namespace App\Http\Requests\DocumentType;

use App\Constants\DocumentType\DocumentTypeFieldLengthConstant;
use Illuminate\Foundation\Http\FormRequest;

class DocumentTypeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:'.DocumentTypeFieldLengthConstant::NAME
        ];
    }
}
