<header class="bg-white shadow-sm border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
        <img src="{{ url('images/logo.png') }}" alt="Logo" style="height: 50px">
      </a>      
      <button class="navbar-toggler custom-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active fw-bold primary-color' : '' }}" href="{{url('/')}}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('what-we-do') || request()->is('what-we-do/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('/what-we-do')}}">WHAT WE DO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('how-we-do-it') || request()->is('how-we-do-it/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('/how-we-do-it')}}">HOW WE DO IT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('impact') || request()->is('impact/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('/impact')}}">OUR IMPACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('news') || request()->is('news/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('/news')}}">NEWS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('about') || request()->is('about/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('about')}}">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact-us') || request()->is('contact-us/*') ? 'active fw-bold primary-color' : '' }}" href="{{url('contact-us')}}">CONTACT US</a>
          </li>
        </ul>
      </div>

      <!-- Right-end Button -->
      <div class="d-none d-lg-flex">
        <a href="{{ url('get-involved') }}" class="btn primary-button {{ request()->is('get-involved') || request()->is('get-involved/*') ? 'active' : '' }}">GET INVOLVED</a>
      </div>
    </div>
  </nav>
</header>
<!-- Bootstrap Bundle (includes Popper for dropdowns) -->




