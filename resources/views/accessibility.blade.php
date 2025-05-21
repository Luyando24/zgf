@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Accessibility Statement</h1>
    
    <p class="mb-4">
        The Zambian Governance Foundation is committed to ensuring digital accessibility for people with disabilities. 
        We are continually improving the user experience for everyone, and applying the relevant accessibility standards.
    </p>
    
    <h2 class="text-2xl font-semibold mt-6 mb-4">Conformance status</h2>
    <p class="mb-4">
        The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve 
        accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA.
        Our website is partially conformant with WCAG 2.1 level AA. Partially conformant means that some parts of the content 
        do not fully conform to the accessibility standard.
    </p>
    
    <h2 class="text-2xl font-semibold mt-6 mb-4">Feedback</h2>
    <p class="mb-4">
        We welcome your feedback on the accessibility of this website. Please let us know if you encounter accessibility 
        barriers:
    </p>
    <ul class="list-disc pl-8 mb-4">
        <li>Phone: {{ $settings->contact_phone ?? 'Contact phone' }}</li>
        <li>E-mail: {{ $settings->contact_email ?? 'Contact email' }}</li>
        <li>Postal address: {{ $settings->address ?? 'Organization address' }}</li>
    </ul>
    
    <h2 class="text-2xl font-semibold mt-6 mb-4">Assessment approach</h2>
    <p class="mb-4">
        The Zambian Governance Foundation assessed the accessibility of this website by the following approaches:
    </p>
    <ul class="list-disc pl-8 mb-4">
        <li>Self-evaluation</li>
        <li>Automated testing using accessibility evaluation tools</li>
    </ul>
</div>
@endsection