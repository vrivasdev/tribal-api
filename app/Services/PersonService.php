<?php

namespace App\Services;

use SoapClient;
use Illuminate\Support\Facades\Http;

class PersonService 
{
    private static $host = 'http://www.crcind.com/csp/samples/SOAP.Demo.cls?WSDL';

    public static function search($term, $media = null)
    {
        $client = new SoapClient(self::$host);
        $result  = $client->GetListByName(['name' => $term]);

        if (isset($result->GetListByNameResult)) {
            $persons = json_decode(json_encode($result->GetListByNameResult->PersonIdentification), true);
            if (isset($persons['ID'])) {
                $persons = [$persons];
            }
        }

        return [
            'code' => isset($result->GetListByNameResult)? 200 : 500,
            'message' => isset($result->GetListByNameResult)? 'Success' : 'Person not found',
            'data' => isset($result->GetListByNameResult)? 
                      $persons : [],
            'status' => isset($result->GetListByNameResult)? 'success': 'error'
        ];
    }
}