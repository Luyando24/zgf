<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($initiatives as $initiative)
    <url>
        <loc>{{ route('initiative.details', $initiative->slug) }}</loc>
        <lastmod>{{ $initiative->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>