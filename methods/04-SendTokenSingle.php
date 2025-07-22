<?php

use Illuminate\Support\Facades\Http;

function sendTokenSingle($templateKey, $destination, $param1, $param2, $param3)
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";

    $params = [
        'ApiKey' => $apiKey,
        'TemplateKey' => $templateKey,
        'Destination' => $destination,
        'p1' => $param1,
        'p2' => $param2,
        'p3' => $param3,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/SendTokenSingle';

    $response = Http::timeout(10)
        ->get($url, $params);

    if ($response->successful()) {
        return $response->body();
    }

    return "Error: " . $response->status();
}
