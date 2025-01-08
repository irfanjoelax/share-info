<?php

namespace App\Http\Controllers\Api\Information;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class ShowDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Show detail information',
            'data' => Information::find($id),
        ]);
    }
}
