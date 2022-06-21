<?php

namespace App\Services;

use App\Models\Post;

class FacebookService
{
    // upload a post to facebook
    public static function post(Post $post)
    {
        $access_token = env('FACEBOOK_ACCESS_TOKEN');
        if ($access_token == null) {
            return ['error' => 'No access token'];
        }
        $url = 'https://graph.facebook.com/feed';
        $data = [
            'message' => $post->title,
            'from' => auth()->user()->name,
            'access_token' => $access_token,
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
