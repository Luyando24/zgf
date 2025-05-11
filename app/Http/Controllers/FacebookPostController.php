<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookPostController extends Controller
{
    public function index()
    {
       
        $pageId = config('services.facebook.page_id');
        $accessToken = config('services.facebook.access_token');
        $baseUri = config('services.facebook.base_uri');
        try {
          
            $response = Http::withOptions([
                'verify' => true,
                'timeout' => 30,
                'connect_timeout' => 30,
                'curl' => [
                    CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
                ]
            ])->get($baseUri.'/'.$pageId."/feed", [
                'access_token' => $accessToken,
                'fields' => 'message,full_picture,created_time,permalink_url'
            ]);
            $data = $response->json();
            $posts = $data['data'] ?? [];
           
        } catch (\Exception $e) {
            Log::error('Facebook API Error: ' . $e->getMessage());
            $posts = [];
        }

        return view('facebook-posts', compact('posts'));
    }
}