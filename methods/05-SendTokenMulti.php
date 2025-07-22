<?php

use Illuminate\Support\Facades\Http;

function sendTokenMulti($templateKey, $destination, $userTraceId, $parameters)
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";

    $recipients = [
        [
            'Destination' => $destination,
            'UserTraceId' => $userTraceId,
            'Parameters' => $parameters,  // آرایه پارامترها
        ]
    ];

    $data = [
        'ApiKey' => $apiKey,
        'TemplateKey' => $templateKey,
        'Recipients' => $recipients,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/SendTokenMulti';

    $response = Http::timeout(10)
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($url, $data);

    if ($response->successful()) {
        return $response->body();
    }

    return "Error: " . $response->status();
}
