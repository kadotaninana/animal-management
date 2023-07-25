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


Route::middleware('auth:sanctum')->get('/animal_management', function (Request $request) {
    return $request->user();
});

Route::apiResource('animal', AnimalManagementController::class);

Route::post('user/register', [UserRegistrationController::class, 'register']);


Route::post('user/login', [AuthController::class, 'login']);


Route::post('user/logout', [AuthController::class, 'logout']);

// Route::post('api/animal', [AuthController::class, 'store']);

Route::get('/medicine_histories/{animalInformationId}', [HistoryFetchController::class, 'fetchMedicineHistory']);
