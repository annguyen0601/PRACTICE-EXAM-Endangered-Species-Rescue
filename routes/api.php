<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;
use App\Http\Middleware\MissionInspector;


/* /api/locations → returns all locations

/api/experts → returns all experts

/api/mission → accepts POST with email, location_id, array of expert IDs
*/

Route::get('/locations', [MissionController::class, 'getLocations']);
Route::get('/experts', [MissionController::class, 'getExperts']);
Route::post('/mission', [MissionController::class, 'store'])
    ->middleware(MissionInspector::class);
