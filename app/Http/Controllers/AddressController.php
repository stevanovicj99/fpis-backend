<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Township $township)
    {
        return new JsonResponse([
            'data' => $township->addresses
        ]);
    }
}
