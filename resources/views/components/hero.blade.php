<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($heroes as $index => $image)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="position: relative;">
        <img src="{{ asset('storage/' . $image->hero_image) }}" class="d-block w-100" alt="{{ $image->hero_title }}">
      </div>
    @endforeach
  </div>
  
  <!-- Text Overlay - Moved outside carousel-inner -->
  <div class="carousel-caption-overlay text-white px-3 px-md-5 py-4">
    <h1 class="main-heading" style="color:#fff">Supporting Zambian communities to lead their own development</h1>
    <p class="sub-heading mt-4" style="color:#fff">We help Zambian civil society and community-based organisations (CSOs and CBOs) become more effective through funding and targeted capacity development support</p>
    <div class="mt-3">
      <a href="{{ route('impact') }}" class="primary-button mt-4" style="text-decoration: none">Our Impact</a>
      <a href="{{ route('get-involved') }}" class="outlined-button mt-4" style="text-decoration: none">Get Involved</a>
      <a href="{{ url('initiatives') }}" class="outlined-button mt-4" style="text-decoration: none">Support an Initiative</a>
    </div>
  </div>
  
  <!-- Add carousel controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  
  <!-- Add indicators -->
  <div class="carousel-indicators">
    @foreach($heroes as $index => $image)
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="{{ $index }}" 
        {{ $index == 0 ? 'class="active" aria-current="true"' : '' }} 
        aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
  </div>
</div>

<!-- Add JavaScript to initialize the carousel -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize the carousel with custom settings
    var heroCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleAutoplaying'), {
      interval: 5000,  // 5 seconds per slide
      wrap: true,      // Cycle continuously
      pause: 'hover'   // Pause on hover
    });
  });
</script>

