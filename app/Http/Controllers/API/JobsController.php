<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JobsModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class JobsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $jobs = JobsModel::where('attempts', '>=', 0)->get();

        if (0 === $jobs->count()) {
            return response()->json(['message' => 'No active queued jobs at the moment.'], 204)->header('Content-Type', 'application/json');
        }

        return response()->json($jobs->toArray(), 200)->header('Content-Type', 'application/json');
    }

    /**
     * @return JsonResponse
     */
    public function start()
    {
        Artisan::call('import:run');
        return response()->json(['message' => 'Job successfully started.'], 200)->header('Content-Type', 'application/json');
    }
}
