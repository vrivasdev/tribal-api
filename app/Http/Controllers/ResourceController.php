<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;

use App\Services\ShowService;
use App\Services\MediaService;
use App\Services\PersonService;

class ResourceController extends Controller
{
    public function get(Request $request)
    {
        $mediaType = ['movie', 'music', 'show', 'person'];

        if (!in_array($request->query('type'), $mediaType)) {
            return response(
                ['message' => 'Media type not found',
                 'status' => 'error'],
                400
            );
        }

        switch($request->query('type')) {
            case 'music':
            case 'movie':
                $result = MediaService::search(
                    $request->query('key'),
                    $request->query('type')
                );
            break;
            case 'show':
                $result = ShowService::search($request->query('key'));
            break;
            case 'person':
                $result = PersonService::search($request->query('key'));
            break;
        }
        return response($result, 
                        $result['code'])->header("Access-Control-Allow-Origin",  "*");
    }
}