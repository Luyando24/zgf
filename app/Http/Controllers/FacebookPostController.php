<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FacebookPostController extends Controller
{
    public function index(Request $request)
    {
        $pageId = config('services.facebook.page_id');
        $accessToken = config('services.facebook.access_token');
        $baseUri = config('services.facebook.base_uri');
        $perPage = 9; // Number of posts per page
        $currentPage = $request->query('page', 1);
        
        try {
            // Store pagination tokens in session to maintain state between requests
            $paginationTokens = session('fb_pagination_tokens', []);
            $nextPageToken = $paginationTokens[$currentPage] ?? null;
            
            if ($currentPage > 1 && !$nextPageToken) {
                // If we're requesting a page but don't have the token, redirect to first page
                return redirect()->route('facebook-posts');
            }
            
            // Build the API request
            $requestParams = [
                'access_token' => $accessToken,
                'fields' => 'message,full_picture,created_time,permalink_url,likes.summary(true),comments.summary(true),shares',
                'limit' => $perPage * 2 // Fetch more than needed to have next page data
            ];
            
            // Add after parameter if we have a pagination token
            if ($nextPageToken) {
                $requestParams['after'] = $nextPageToken;
            }
            
            $response = Http::withOptions([
                'verify' => true,
                'timeout' => 30,
                'connect_timeout' => 30,
            ])->get($baseUri.'/'.$pageId."/feed", $requestParams);
            
            $data = $response->json();
            $allPosts = $data['data'] ?? [];
            
            // Store the next pagination token if available
            if (isset($data['paging']['cursors']['after'])) {
                $paginationTokens[$currentPage + 1] = $data['paging']['cursors']['after'];
                session(['fb_pagination_tokens' => $paginationTokens]);
            }
            
            // Create a collection from the posts
            $postsCollection = Collection::make($allPosts);
            
            // Create a custom paginator
            $posts = new LengthAwarePaginator(
                $postsCollection->forPage($currentPage, $perPage),
                count($allPosts) + ($perPage * ($currentPage - 1)), // Total items (approximate)
                $perPage,
                $currentPage,
                [
                    'path' => route('facebook-posts'),
                    'pageName' => 'page',
                ]
            );
            
            // Check if we have more pages
            $hasMorePages = isset($data['paging']['next']);
            
            return view('facebook-posts', compact('posts', 'hasMorePages'));
            
        } catch (\Exception $e) {
            Log::error('Facebook API Error: ' . $e->getMessage());
            return view('facebook-posts', ['posts' => [], 'error' => $e->getMessage()]);
        }
    }
}
