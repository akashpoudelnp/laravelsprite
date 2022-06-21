<?php

namespace App\Services;

class TwitterService
{
    public static function tweet($message)
    {
        $authorization = "Authorization: Bearer " . env('TWITTER_BEARER_TOKEN');
        $url = 'https://api.twitter.com/2/tweets';
        $data = [
            'message' => $message,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
