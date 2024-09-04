<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcontractorOfferCreateRequest;
use App\Http\Requests\SubcontractorOfferUpdateRequest;
use App\Models\Subcontractor;
use App\Models\SubcontractorContract;
use App\Models\SubcontractorOffer;
use App\Models\Employee;
use App\Models\Consent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class SubcontractorOfferController extends Controller
{
    public function store(SubcontractorOfferCreateRequest $subcontractorOfferCreateRequest)
    {
        $subcontractorOffer = null;
        DB::transaction(function () use ($subcontractorOfferCreateRequest) {

            $subcontractorOffer = new SubcontractorOffer();

            $subcontractorOffer->subcontractorOffer_name = $subcontractorOfferCreateRequest->input('subcontractorOffer_name');
            $subcontractorOffer->subcontractorOffer_date = $subcontractorOfferCreateRequest->input('subcontractorOffer_date');
            $subcontractorOffer->subcontractorOffer_price = $subcontractorOfferCreateRequest->input('subcontractorOffer_price');
            $subcontractorOffer->subcontractor_status = $subcontractorOfferCreateRequest->input('subcontractor_status');
            $subcontractorOffer->subcontractor_id = $subcontractorOfferCreateRequest->input('subcontractor_id');

            $subcontractorOffer->save();

            foreach ($subcontractorOfferCreateRequest->input('subcontractor_contracts') as $sc) {
                $subcontractor_contract = new SubcontractorContract();

                $subcontractor_contract->subcontractorContract_conclusionDate = $sc['subcontractorContract_conclusionDate'];
                $subcontractor_contract->subcontractorContract_deadline = $sc['subcontractorContract_deadline'];
                $subcontractor_contract->consent_id = $sc['consent_id'];
                $subcontractor_contract->employee_id = $sc['employee_id'];
                $subcontractor_contract->subcontractor_offer_id = $subcontractorOffer->id;

                $subcontractor_contract->save();
            }
        });

        return new JsonResponse([
            'data' => $subcontractorOffer?->load('contracts')
        ]);
    }

    public function index()
    {
        return new JsonResponse([
            'data' => SubcontractorOffer::with(['subcontractor', 'contracts'])->get()
        ]);
    }

    public function show(SubcontractorOffer $subcontractorOffer)
    {
        return new JsonResponse([
            'data' => [
                'subscontractorOffer' => $subcontractorOffer->load('contracts'),
                'employees' => Employee::all(),
                'consents' => Consent::all(),
                'subcontractors' => Subcontractor::with(['city', 'township', 'address'])->get(),
                'subcontractor' => $subcontractorOffer->subcontractor,
            ]
        ]);
    }

    public function update(SubcontractorOfferUpdateRequest $subcontractorOfferUpdateRequest, SubcontractorOffer $subcontractorOffer)
    {
        DB::transaction(function () use ($subcontractorOffer, $subcontractorOfferUpdateRequest) {
            $subcontractorOffer->subcontractorOffer_name = $subcontractorOfferUpdateRequest->input('subcontractorOffer_name');
            $subcontractorOffer->subcontractorOffer_date = $subcontractorOfferUpdateRequest->input('subcontractorOffer_date');
            $subcontractorOffer->subcontractor_status = $subcontractorOfferUpdateRequest->input('subcontractor_status');
            $subcontractorOffer->subcontractor_id = $subcontractorOfferUpdateRequest->input('subcontractor_id');

            $subcontractorOffer->save();

            foreach ($subcontractorOfferUpdateRequest->input('subcontractor_contracts_create') as $sc) {
                $subcontractor_contract = new SubcontractorContract();

                $subcontractor_contract->subcontractorContract_conclusionDate = $sc['subcontractorContract_conclusionDate'];
                $subcontractor_contract->subcontractorContract_deadline = $sc['subcontractorContract_deadline'];
                $subcontractor_contract->consent_id = $sc['consent_id'];
                $subcontractor_contract->employee_id = $sc['employee_id'];
                $subcontractor_contract->subcontractor_offer_id = $subcontractorOffer->id;

                $subcontractor_contract->save();
            }

            foreach ($subcontractorOfferUpdateRequest->input('subcontractor_contracts_edit') as $sc) {
                $subcontractor_contract = SubcontractorContract::find($sc['id']);

                $subcontractor_contract->subcontractorContract_deadline = $sc['deadline'];

                $subcontractor_contract->save();
            }

            foreach ($subcontractorOfferUpdateRequest->input('subcontractor_contracts_delete') as $sc) {
                SubcontractorContract::destroy($sc['id']);
            }
        });

        return new JsonResponse([
            'data' => $subcontractorOffer->load('contracts')
        ]);
    }
}
