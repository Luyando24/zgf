@php
// Get settings from database
$settings = \App\Models\Setting::first();

// Default values
$title = $title ?? ($settings->meta_title ?? $settings->site_name ?? config('app.name'));
$description = $description ?? ($settings->meta_description ?? $settings->site_description ?? 'Zambian Governance Foundation');
$ogImage = $ogImage ?? ($settings && $settings->og_image ? Storage::url($settings->og_image) : asset('images/logo.png'));
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
  "logo": "{{ $settings && $settings->site_logo ? Storage::url($settings->site_logo) : asset('images/logo.png') }}",
  "sameAs": [
    @if($settings && $settings->facebook_url)"https://{{ $settings->facebook_url }}"@endif
    @if($settings && $settings->twitter_url)@if($settings && $settings->facebook_url), @endif"https://{{ $settings->twitter_url }}"@endif
    @if($settings && $settings->instagram_url)@if($settings && ($settings->facebook_url || $settings->twitter_url)), @endif"https://{{ $settings->instagram_url }}"@endif
    @if($settings && $settings->linkedin_url)@if($settings && ($settings->facebook_url || $settings->twitter_url || $settings->instagram_url)), @endif"https://{{ $settings->linkedin_url }}"@endif
    @if($settings && $settings->youtube_url)@if($settings && ($settings->facebook_url || $settings->twitter_url || $settings->instagram_url || $settings->linkedin_url)), @endif"https://{{ $settings->youtube_url }}"@endif
  ]
}
</script>
@endif

{{-- Google Analytics --}}
@if($settings && $settings->google_analytics_id)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ $settings->google_analytics_id }}');
</script>
@endif

{{-- Custom Header Scripts --}}
@if($settings && $settings->header_scripts)
{!! $settings->header_scripts !!}
@endif
