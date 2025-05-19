<div>
    @if($getRecord()->evidence_file)
        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-2">
                <x-heroicon-o-paper-clip class="w-5 h-5 text-gray-500" />
                <a 
                    href="{{ Storage::url($getRecord()->evidence_file) }}" 
                    target="_blank" 
                    class="text-primary-600 hover:text-primary-500 font-medium"
                >
                    View Attachment
                </a>
            </div>
            
            @php
                $extension = pathinfo($getRecord()->evidence_file, PATHINFO_EXTENSION);
                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            @endphp
            
            @if($isImage)
                <div class="mt-2 border border-gray-200 rounded-lg overflow-hidden">
                    <img 
                        src="{{ Storage::url($getRecord()->evidence_file) }}" 
                        alt="Evidence" 
                        class="max-w-full h-auto"
                    />
                </div>
            @endif
        </div>
    @else
        <span class="text-gray-500 italic">No file attached</span>
    @endif
</div>