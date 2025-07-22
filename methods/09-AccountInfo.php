<?php

use Illuminate\Support\Facades\Http;

function accountInfo()
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";

    $data = [
        'ApiKey' => $apiKey,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/AccountInfo';

    $response = Http::timeout(10)
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($url, $data);

    if ($response->successful()) {
        return $response->body();
    }

    return "Error: " . $response->status();
}
