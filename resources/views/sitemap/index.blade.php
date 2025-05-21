<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('sitemap/pages.xml') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap/posts.xml') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap/initiatives.xml') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap/careers.xml') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap/resources.xml') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
    </sitemap>
</sitemapindex>
