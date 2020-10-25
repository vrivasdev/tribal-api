<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShowService 
{
    private static $host = 'http://api.tvmaze.com/singlesearch';

    public static function search($term)
    {   
        $response = Http::get(self::$host . "/shows?q='$term'");
        $body = json_decode($response->body());

        return [
            'code' => $response->status(),
            'message' => $response->ok()? 'Success' : 'Show doesn\'t exist',
            'data' => $response->ok()? $body : [],
            'status' => $response->ok()? 'success': 'error'
        ];
    }
}