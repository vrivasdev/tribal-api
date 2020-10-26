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

        return [
            'code' => isset($result->GetListByNameResult)? 200 : 500,
            'message' => isset($result->GetListByNameResult)? 'Success' : 'Person not found',
            'data' => isset($result->GetListByNameResult)? 
                      [json_decode(json_encode($result->GetListByNameResult->PersonIdentification), true)] : [],
            'status' => isset($result->GetListByNameResult)? 'success': 'error'
        ];
    }
}