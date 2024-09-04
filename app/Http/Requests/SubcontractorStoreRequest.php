<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcontractorStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "subcontractor_name" => "required|string|max:50",
            "subcontractor_taxID" => "required|integer",
            "subcontractor_type" => "required|string|max:50",
            "city_id" => "required|exists:cities,id",
            "township_id" => "required|exists:townships,id",
            "address_id" => "required|exists:addresses,id"
        ];
    }
}
