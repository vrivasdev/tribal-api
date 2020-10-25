<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Services\MediaService;

class ResourceController extends Controller
{
    public function get(Request $request)
    {
        $result = MediaService::search($request->query('key'));
        return Response::json([
            'data' => json_decode($result)
        ]);
    }
}
