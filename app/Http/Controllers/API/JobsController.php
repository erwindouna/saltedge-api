<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function index()
    {
        return response()->json('what')->header('Content-Type', 'application/json');
    }
}
