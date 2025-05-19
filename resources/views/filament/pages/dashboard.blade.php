<x-filament-panels::page>
    <div class="grid grid-cols-1 gap-6">
        <div class="p-6 bg-white rounded-xl shadow-sm">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-primary-100 rounded-full">
                    <x-heroicon-o-exclamation-triangle class="w-8 h-8 text-primary-500" />
                </div>
                <div>
                    <h2 class="text-xl font-bold tracking-tight">Reporting System Dashboard</h2>
                    <p class="text-gray-500">Monitor reports, manage content, and configure system settings</p>
                </div>
            </div>
        </div>
        
        @foreach ($this->getWidgets() as $widget)
            @if ($widget instanceof \Filament\Widgets\Widget)
                {{ $widget }}
            @endif
        @endforeach
    </div>
</x-filament-panels::page>