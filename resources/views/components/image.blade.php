<img 
    src="{{ $src }}" 
    @if($decorative)
        alt="" 
        role="presentation"
    @else
        alt="{{ $alt }}" 
    @endif
    class="{{ $class }}"
    {{ $attributes }}
>