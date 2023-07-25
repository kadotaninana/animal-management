<?php

use App\Http\Controllers\AnimalManagementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryFetchController;
use App\Http\Controllers\UserRegistrationController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('animal', AnimalManagementController::class);

    Route::get('/medicine_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchMedicineHistory']);

    Route::get('/outpatient_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchOutpatientHistory']);

    Route::get('/body_weight_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchBodyWeightHistory']);

    Route::get('/food_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchFoodHistory']);

    Route::get('/vaccination_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchVaccinationHistory']);
});

Route::post('user/register', [UserRegistrationController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
