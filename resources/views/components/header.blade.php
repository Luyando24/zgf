<header class="bg-white shadow-sm border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
        <img src="{{ url('images/logo.png') }}" alt="Logo" style="height: 50px">
      </a>      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/what-we-do')}}">WHAT WE DO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/why-us')}}">IMPACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/news')}}">NEWSFLASH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('about')}}">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact-us')}}">CONTACT</a>
          </li>
        </ul>
      </div>

      <!-- Right-end Button -->
      <div class="d-none d-lg-flex">
            <a href="{{ url('login') }}" class="btn primary-button">GET INVOLVED</a>
    </div>
    
    
    
    
    </div>
  </nav>
</header>
<!-- Bootstrap Bundle (includes Popper for dropdowns) -->

