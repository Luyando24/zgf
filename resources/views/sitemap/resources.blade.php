<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($resources as $resource)
    <url>
        <loc>{{ route('resource.details', $resource->slug) }}</loc>
        <lastmod>{{ $resource->updated_at->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>