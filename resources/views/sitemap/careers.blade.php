<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($careers as $career)
    <url>
        <loc>{{ route('career.details', $career->slug) }}</loc>
        <lastmod>{{ $career->updated_at->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>