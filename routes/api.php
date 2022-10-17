<?php

use App\Http\Resources\GeoResource;
use App\Http\Resources\GeosCollection;
use App\Models\Geo;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/geos/{geo}', function(Geo $geo) {
    return new GeoResource($geo);
});

Route::get('/geos', function () {
    return new GeosCollection(Geo::all());
});
