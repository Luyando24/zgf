<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($heroes as $index => $image)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="position: relative;">
        <img src="{{ asset('storage/' . $image->hero_image) }}" class="d-block w-100" alt="{{ $image->hero_title }}">
      </div>
    @endforeach
    <!-- Text Overlay -->
    <div class="carousel-caption-overlay text-white px-3 px-md-5 py-4">
      <h1 class="main-heading" style="color:#fff">Supporting Zambian communities to lead their own development</h1>
      <p class="sub-heading mt-4" style="color:#fff">We help Zambian civil society and community-based organisations (CSOs and CBOs) become more effective through funding and targeted capacity development support</p>
      <div class="mt-3">
        <a href="{{ route('impact') }}" class="primary-button mt-4" style="text-decoration: none">Our Impact</a>
        <a href="{{ route('get-involved') }}" class="outlined-button mt-4" style="text-decoration: none">Get Involved</a>
      </div>
    </div>
</div>