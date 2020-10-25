<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MediaService 
{
    private static $host = 'https://itunes.apple.com';

    public static function search($term, $media = null)
    {        
        $response = Http::get(self::$host . "/search?term='$term'&media=$media");
        $body = json_decode($response->body());

        return [
            'code' => $response->status(),
            'message' => $response->ok()? 'Success' : $body->errorMessage,
            'data' => $response->ok()? $body->results : [],
            'status' => $response->ok()? 'success': 'error'
        ];
    }
}