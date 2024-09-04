<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcontractorOfferUpdateRequest extends FormRequest
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
            "subcontractor_id" => "required|exists:subcontractors,id",
            "subcontractor_status" => [
                'required',
                Rule::in(['created', 'updated', 'signed']),
            ],
            "subcontractor_contracts_create" => "sometimes|array",
            "subcontractor_contracts_create.*.subcontractorContract_conclusionDate" => "required|date",
            "subcontractor_contracts_create.*.subcontractorContract_deadline" => "required|date",
            "subcontractor_contracts_create.*.consent_id" => "required|exists:consents,id",
            "subcontractor_contracts_create.*.employee_id" => "required|exists:employees,employee_identificator",
            "subcontractor_contracts_edit" => "sometimes|array",
            "subcontractor_contracts_edit.*.id" => "required|exists:subcontractor_contracts,id",
            "subcontractor_contracts_edit.*.deadline" => "required|date",
            "subcontractor_contracts_delete" => "sometimes|array",
            "subcontractor_contracts_delete.*.id" => "required|exists:subcontractor_contracts,id",

        ];
    }
}
