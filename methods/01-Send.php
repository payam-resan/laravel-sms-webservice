<?php

use Illuminate\Support\Facades\Http;

function send($recipients, $text)
{
    $apiKey = "e883424d-d70f-4e58-8ee3-4e21ea390ff1";
    $sender = "30007546464646";

    $params = [
        'ApiKey' => $apiKey,
        'Text' => urlencode($text),
        'Sender' => $sender,
        'Recipients' => $recipients,
    ];

    $url = 'http://api.sms-webservice.com/api/V3/Send';

    // ارسال درخواست GET با پارامترها در query string
    $response = Http::timeout(10)
        ->get($url, $params);

    if ($response->successful()) {
        return $response->body(); // پاسخ متنی
    } else {
        // می‌تونی این قسمت رو برای مدیریت خطا تغییر بدی
        return "Error: " . $response->status();
    }
}
