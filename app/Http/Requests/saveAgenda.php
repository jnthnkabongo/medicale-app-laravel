<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveAgenda extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_rdv' => 'required',
            'spec_id' => 'required',
            'users_id' => 'required'
        ];
    }
}