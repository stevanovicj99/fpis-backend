<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcontractorOfferCreateRequest extends FormRequest
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
            "subcontractorOffer_name" => "required|string|max:50",
            "subcontractorOffer_date" => "required|date",
            "subcontractorOffer_price" => "required|integer",
            "subcontractor_id" => "required|exists:subcontractors,id",
            "subcontractor_status" => [
                'required',
                Rule::in(['created', 'updated', 'signed']),
            ],
            "subcontractor_contracts" => "required|array",
            "subcontractor_contracts.*.subcontractorContract_conclusionDate" => "required|date",
            "subcontractor_contracts.*.subcontractorContract_deadline" => "required|date",
            "subcontractor_contracts.*.consent_id" => "required|exists:consents,id",
            "subcontractor_contracts.*.employee_id" => "required|exists:employees,employee_identificator"

        ];
    }
}
