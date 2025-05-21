<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccessibilityMonitoring
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Only process HTML responses
        if (is_object($response) && method_exists($response, 'header') && 
            strpos($response->header('Content-Type'), 'text/html') !== false) {
            
            $content = $response->getContent();
            
            // Basic accessibility checks
            $this->checkForAccessibilityIssues($content, $request->url());
        }
        
        return $response;
    }
    
    private function checkForAccessibilityIssues($content, $url)
    {
        $issues = [];
        
        // Check for images without alt text
        if (preg_match_all('/<img[^>]+(?!alt=)[^>]*>/i', $content, $matches)) {
            $issues[] = 'Images without alt attribute found';
        }
        
        // Check for empty alt text on non-decorative images
        if (preg_match_all('/<img[^>]+alt=""[^>]*(?!role="presentation")[^>]*>/i', $content, $matches)) {
            $issues[] = 'Images with empty alt text but no presentation role found';
        }
        
        // Check for form inputs without labels
        if (preg_match_all('/<input[^>]+(?!aria-label|aria-labelledby)[^>]*>/i', $content, $matches)) {
            foreach ($matches[0] as $match) {
                if (!preg_match('/id="([^"]+)"/i', $match, $idMatch)) {
                    $issues[] = 'Form input without associated label found';
                } else {
                    $id = $idMatch[1];
                    if (!preg_match('/<label[^>]+for="' . $id . '"[^>]*>/i', $content)) {
                        $issues[] = 'Form input with ID but no associated label found';
                    }
                }
            }
        }
        
        // Log issues if found
        if (!empty($issues)) {
            Log::channel('accessibility')->info('Accessibility issues found on ' . $url, [
                'issues' => $issues
            ]);
        }
    }
}