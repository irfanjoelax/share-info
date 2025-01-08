<?php

namespace App\Http\Controllers\Api\Information;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class GetAllController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Get all informations data',
            'data' => Information::latest()->get(),
        ]);
    }
}
