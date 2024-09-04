<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    public function index(City $city)
    {
        return new JsonResponse([
            'data' => $city->townships
        ]);
    }
}
