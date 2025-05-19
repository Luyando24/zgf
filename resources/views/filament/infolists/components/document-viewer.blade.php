@php
    $state = $getState();
@endphp

<div class="document-viewer">
    @php
        $url = null;
        if ($getRecord() && $getRecord()->{$getStatePath()}) {
            $url = Storage::disk('public')->url($getRecord()->{$getStatePath()});
        }
    @endphp

    @if ($url)
        <div class="flex flex-col space-y-2">
            <div class="pdf-container border border-gray-300 rounded-lg overflow-hidden" style="height: 600px;">
                <iframe 
                    src="{{ $url }}#toolbar=1&navpanes=1&scrollbar=1" 
                    width="100%" 
                    height="100%" 
                    style="border: none;"
                    title="PDF Viewer"
                    loading="lazy"
                    allow="fullscreen"
                ></iframe>
            </div>
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    {{ basename($getRecord()->{$getStatePath()}) }}
                </div>
                <div class="flex space-x-2">
                    <a 
                        href="{{ $url }}" 
                        target="_blank" 
                        class="inline-flex items-center justify-center py-1 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    >
                        <x-heroicon-o-arrow-top-right-on-square class="w-4 h-4 mr-1" />
                        Open in New Tab
                    </a>
                    <a 
                        href="{{ $url }}" 
                        download 
                        class="inline-flex items-center justify-center py-1 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    >
                        <x-heroicon-o-arrow-down-tray class="w-4 h-4 mr-1" />
                        Download
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-gray-500 italic">No document available</div>
    @endif
</div>

