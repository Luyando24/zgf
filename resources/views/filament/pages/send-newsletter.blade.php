<x-filament-panels::page>
    <form wire:submit.prevent="send" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Send Newsletter to {{ $subscriberCount }} subscriber{{ $subscriberCount === 1 ? '' : 's' }}
        </x-filament::button>
    </form>
</x-filament-panels::page>
