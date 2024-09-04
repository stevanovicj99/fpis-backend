<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcontractorStoreRequest;
use App\Models\Subcontractor;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcontractorController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' => Subcontractor::with(['city', 'township', 'address'])->get()
        ]);
    }

    public function show(Subcontractor $subcontractor)
    {
        return new JsonResponse([
            'data' => [
                'subcontractor' => $subcontractor,
                'cities' => City::all(),
                'townships' => $subcontractor->city->townships,
                'addresses' => $subcontractor->township->addresses,
            ]
        ]);
    }

    public function store(SubcontractorStoreRequest $subcontractorStoreRequest)
    {
        $subcontractor = new Subcontractor();
        $subcontractor->subcontractor_name = $subcontractorStoreRequest->input('subcontractor_name');
        $subcontractor->subcontractor_taxID = $subcontractorStoreRequest->input('subcontractor_taxID');
        $subcontractor->subcontractor_type = $subcontractorStoreRequest->input('subcontractor_type');

        $subcontractor->city_id = $subcontractorStoreRequest->input('city_id');
        $subcontractor->township_id = $subcontractorStoreRequest->input('township_id');
        $subcontractor->address_id = $subcontractorStoreRequest->input('address_id');

        $subcontractor->save();

        return new JsonResponse([
            'data' => $subcontractor
        ]);
    }

    public function update(Subcontractor $subcontractor, SubcontractorStoreRequest $subcontractorStoreRequest)
    {
        $subcontractor->subcontractor_name = $subcontractorStoreRequest->input('subcontractor_name');
        $subcontractor->subcontractor_taxID = $subcontractorStoreRequest->input('subcontractor_taxID');
        $subcontractor->subcontractor_type = $subcontractorStoreRequest->input('subcontractor_type');

        $subcontractor->city_id = $subcontractorStoreRequest->input('city_id');
        $subcontractor->township_id = $subcontractorStoreRequest->input('township_id');
        $subcontractor->address_id = $subcontractorStoreRequest->input('address_id');

        $subcontractor->save();

        return new JsonResponse([
            'data' => $subcontractor
        ]);
    }

    public function destroy(Subcontractor $subcontractor)
    {
        $subcontractor->delete();

        return new JsonResponse([
            'data' => []
        ]);
    }
}
