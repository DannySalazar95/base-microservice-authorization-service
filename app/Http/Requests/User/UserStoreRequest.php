<?php

namespace App\Http\Requests\User;

use App\Constants\User\UserFieldLengthConstant;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name'          => 'required|max:'.UserFieldLengthConstant::FIRST_NAME,
            'father_last_name'    => 'required|max:'.UserFieldLengthConstant::FATHER_LAST_NAME,
            'mother_last_name'    => 'required|max:'.UserFieldLengthConstant::MOTHER_LAST_NAME,
            'birth_of_date'       => 'required|date',
            'email'               => 'required|email',
            'document_type'       => 'required',
            'document_number'     => 'required',
            'password'            => 'required|min:8'
        ];
    }
}
