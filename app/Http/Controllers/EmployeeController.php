<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            'data' => Employee::all()
        ]);
    }
}
