<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'birth_date' => 'required|date_format:Y-m-d',
            'south_african_id_number' => 'required|string|max:255',
            'language_id' => 'required|numeric|exists:languages,id',
            'interests' => 'required|array',
            'interests.*' => 'required|numeric|exists:interests,id'
        ];
    }
}
