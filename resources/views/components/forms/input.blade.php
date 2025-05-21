@props(['id', 'name', 'label', 'type' => 'text', 'value' => '', 'required' => false, 'error' => null])

<div class="mb-4">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
        @if($required)
            <span class="text-red-500" aria-hidden="true">*</span>
            <span class="sr-only">required</span>
        @endif
    </label>
    
    <input 
        type="{{ $type }}" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        @if($required) required aria-required="true" @endif
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm
        @error($name) border-red-500 @enderror"
        @if($error) aria-describedby="{{ $id }}-error" @endif
        {{ $attributes }}
    >
    
    @if($error)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-red-600" role="alert">{{ $error }}</p>
    @endif
</div>