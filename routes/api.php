<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ConsentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubcontractorController;
use App\Http\Controllers\SubcontractorOfferController;
use App\Http\Controllers\TownshipController;
use App\Models\SubcontractorOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/townships/{city}', [TownshipController::class, 'index']);
    Route::get('/addresses/{township}', [AddressController::class, 'index']);
    Route::prefix('/subcontractors')->group(function () {
        Route::get('/', [SubcontractorController::class, 'index']);
        Route::get('/{subcontractor}', [SubcontractorController::class, 'show']);
        Route::post('/', [SubcontractorController::class, 'store']);
        Route::put('/{subcontractor}', [SubcontractorController::class, 'update']);
        Route::delete('/{subcontractor}', [SubcontractorController::class, 'destroy']);
    });
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/consents', [ConsentController::class, 'index']);

    Route::prefix('/subcontractor-offers')->group(function () {
        Route::get('/', [SubcontractorOfferController::class, 'index']);
        Route::get('/{subcontractorOffer}', [SubcontractorOfferController::class, 'show']);
        Route::post('/', [SubcontractorOfferController::class, 'store']);
        Route::put('/{subcontractorOffer}', [SubcontractorOfferController::class, 'update']);
    });
});
