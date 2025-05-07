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

        try {
            $response = Http::withOptions([
                'verify' => true, // Use trusted CA certificates
                'timeout' => 30,
                'connect_timeout' => 30,
                'curl' => [
                    CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
                ]
            ])->get("https://graph.facebook.com/v19.0/{$pageId}/feed", [
                'access_token' => $accessToken,
                'fields' => 'message,full_picture,created_time,permalink_url'
            ]);

            // Decode JSON response
            $data = $response->json();

            // For debugging: see what the API returns
            // Remove this after confirming it works
            

            // Extract posts or default to empty array
            $posts = $data['data'] ?? [];
            dd($data);
        } catch (\Exception $e) {
            // Log any exception
            Log::error('Facebook API Error: ' . $e->getMessage());
            $posts = [];
        }

        return view('facebook-posts', compact('posts'));
    }
}