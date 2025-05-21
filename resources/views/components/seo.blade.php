@php
// Get settings from database
$settings = \App\Models\Setting::first() ?? new \App\Models\Setting();

// Default values
$title = $title ?? ($settings->meta_title ?? $settings->site_name ?? config('app.name'));
$description = $description ?? ($settings->meta_description ?? $settings->site_description ?? 'Zambian Governance Foundation');
$ogImage = $ogImage ?? ($settings->og_image ? Storage::url($settings->og_image) : asset('images/logo.png'));
$canonicalUrl = $canonicalUrl ?? url()->current();
$keywords = $keywords ?? ($settings->meta_keywords ?? 'ZGF, Zambian Governance Foundation, Zambia, NGO');
@endphp

{{-- Primary Meta Tags --}}
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
@if($keywords)
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="author" content="{{ $settings->site_name ?? 'Zambian Governance Foundation' }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="{{ $settings->site_name ?? 'Zambian Governance Foundation' }}">

{{-- Twitter --}}
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $canonicalUrl }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $ogImage }}">

{{-- Favicon --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{ $settings->site_favicon ? Storage::url($settings->site_favicon) : asset('images/favicon.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ $settings->site_favicon ? Storage::url($settings->site_favicon) : asset('images/favicon.png') }}">

{{-- Additional SEO tags --}}
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">
<meta name="googlebot" content="{{ $robots ?? 'index, follow' }}">

{{-- Google Analytics --}}
@if($settings->google_analytics_id)
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ $settings->google_analytics_id }}');
</script>
@endif

{{-- Additional header scripts from settings --}}
@if($settings->header_scripts)
{!! $settings->header_scripts !!}
@endif

{{-- Schema.org markup --}}
@if(isset($schemaMarkup))
<script type="application/ld+json">
{!! $schemaMarkup !!}
</script>
@else
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "{{ $settings->site_name ?? 'Zambian Governance Foundation' }}",
  "url": "{{ url('/') }}",
  "logo": "{{ $settings->site_logo ? Storage::url($settings->site_logo) : asset('images/logo.png') }}",
  "sameAs": [
    @if($settings->facebook_url)"https://{{ $settings->facebook_url }}"@endif
    @if($settings->twitter_url), "https://{{ $settings->twitter_url }}"@endif
    @if($settings->instagram_url), "https://{{ $settings->instagram_url }}"@endif
    @if($settings->linkedin_url), "https://{{ $settings->linkedin_url }}"@endif
    @if($settings->youtube_url), "https://{{ $settings->youtube_url }}"@endif
  ]
}
</script>
@endif