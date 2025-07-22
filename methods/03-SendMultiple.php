<?php

use Illuminate\Support\Facades\Http;

function sendMultiple($destination, $userTraceId, $text)
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";
    $sender = 30007546464646;

    $recipients = [
        [
            'Sender' => $sender,
            'Text' => $text,
            'Destination' => $destination,
            'UserTraceId' => $userTraceId,
        ]
    ];

    $data = [
        'ApiKey' => $apiKey,
        'Recipients' => $recipients,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/SendMultiple';

    $response = Http::timeout(10)
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($url, $data);

    if ($response->successful()) {
        return $response->body();
    }

    return "Error: " . $response->status();
}
