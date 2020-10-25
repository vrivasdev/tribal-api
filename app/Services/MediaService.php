<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MediaService 
{
    private static $host = 'https://itunes.apple.com';

    public static function search($term)
    {
        return Http::get(self::$host . "/search?term=" . $term)->body();
    }
}