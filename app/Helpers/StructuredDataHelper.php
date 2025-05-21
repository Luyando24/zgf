<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StructuredDataHelper
{
    /**
     * Generate Article schema for a blog post
     */
    public static function generateArticleSchema($post, $settings = null)
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Article",
            "headline" => $post->title,
            "description" => $post->meta_description ?? Str::limit(strip_tags($post->content), 160),
            "datePublished" => $post->created_at->toIso8601String(),
            "dateModified" => $post->updated_at->toIso8601String(),
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => route('posts.show', $post->slug)
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => $settings->site_name ?? config('app.name'),
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => $settings && $settings->site_logo 
                        ? asset('storage/' . $settings->site_logo) 
                        : asset('images/logo.png')
                ]
            ]
        ];
        
        // Add author if available
        if ($post->author) {
            $schema["author"] = [
                "@type" => "Person",
                "name" => $post->author->name
            ];
        }
        
        // Add featured image if available
        if ($post->featured_image) {
            $schema["image"] = [
                "@type" => "ImageObject",
                "url" => asset('storage/' . $post->featured_image),
                "width" => "1200",
                "height" => "630"
            ];
        }
        
        return json_encode($schema);
    }
}