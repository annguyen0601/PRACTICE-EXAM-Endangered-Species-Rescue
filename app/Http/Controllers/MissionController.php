<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\MissionInspector;
use App\Models\Mission;
use App\Models\Location;
use App\Models\Expert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\MissionReport;

class MissionController extends Controller
{
    public function getLocations()
    {
        Log::info("Fetching all locations");
        return Location::all();
    }

    public function getExperts()
    {
        Log::info("Fetching all experts");
        return Expert::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'leader_email' => 'required|email|max:255',
            'location_id' => 'required|exists:locations,id',
            'experts' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $experts = Expert::findMany($request->experts);

        $totalSkill = $experts->sum(function ($expert) {
            return ($expert->experience * 1.5) + $expert->skill;
        });

        $location = Location::find($request->location_id);
        $success = $totalSkill >= $location->threat_level;

        $names = $experts->pluck('name')->toArray();
        $report = "Mission to {$location->name} was " . ($success ? 'a success' : 'a failure') . ($success ? ', thanks to the power of the experts' : ', due to poor performance of the experts')
            . implode(', ', $names) . ".";

        $mission = Mission::create([
            'location_id' => $location->id,
            'leader_email' => $request->leader_email,
            'report' => $report,
            'success' => $success,
        ]);

        Mail::to($request->leader_email)->send(new MissionReport($mission));

        return response()->json(['message' => 'Mission created successfully', 'mission' => $mission], 201);
    }
}
