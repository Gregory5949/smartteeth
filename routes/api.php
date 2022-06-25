<?php

use App\Http\Controllers\AnalyzeController;
use App\Http\Resources\AnalyzeResource;
use App\Models\Analyze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('analyzes/{id}', function ($id) {
        $analyze = Analyze::find($id);
        if ($analyze->user_id == Auth::id()) {
            return new AnalyzeResource($analyze);
        }
    });
    Route::post('analyzes', [AnalyzeController::class, 'store']);
});
