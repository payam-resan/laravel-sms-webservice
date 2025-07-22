<?php

use Illuminate\Support\Facades\Http;

function sendBulk($destination, $userTraceId, $text)
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";
    $sender = 30007546464646;

    $recipients = [
        [
            'Destination' => $destination,
            'UserTraceId' => $userTraceId,
        ]
    ];

    $data = [
        'ApiKey' => $apiKey,
        'Text' => $text,
        'Sender' => $sender,
        'Recipients' => $recipients,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/SendBulk';

    $response = Http::timeout(10)
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($url, $data);

    if ($response->successful()) {
        return $response->body();
    }

    return "Error: " . $response->status();
}
