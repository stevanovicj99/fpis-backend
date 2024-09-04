<?php

namespace App\Http\Controllers;

use App\Models\Consent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' => Consent::all()
        ]);
    }
}
