<nav role="navigation" aria-label="Main navigation">
    <button 
        id="mobile-menu-button" 
        aria-expanded="false" 
        aria-controls="mobile-menu"
        aria-label="Toggle menu"
        class="md:hidden"
    >
        <span class="sr-only">Menu</span>
        <!-- Menu icon -->
    </button>
    
    <ul id="mobile-menu" class="hidden md:flex">
        <li><a href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">Home</a></li>
        <li><a href="{{ route('about') }}" aria-current="{{ request()->routeIs('about') ? 'page' : 'false' }}">About</a></li>
        <!-- Other menu items -->
    </ul>
</nav>

<script>
    // Toggle mobile menu with accessibility support
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    menuButton.addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !expanded);
        mobileMenu.classList.toggle('hidden');
    });
</script>