<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JobsModel;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = JobsModel::all();

        if (0 === $jobs->count()) {
            return response()->json(['message' => 'No active queued jobs at the moment.'], 204)->header('Content-Type', 'application/json');
        }

        return response()->json($jobs->toArray(), 200)->header('Content-Type', 'application/json');
    }
}
