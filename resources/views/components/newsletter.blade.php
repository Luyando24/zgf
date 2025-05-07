<section class="newsletter-section bg-dark py-5 text-white" style="margin-bottom: -25px">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <h2 class="mb-3">Subscribe to Our Newsletter</h2>
          <p class="mb-4">
            Stay connected with the Zambian Governance Foundation. Get the latest updates on funding opportunities, governance initiatives, community stories, and civil society insights—delivered straight to your inbox.
          </p>
          <form action="{{ url('newsletter.subscribe') }}" method="POST" class="row g-2">
            @csrf
            <div class="col-12 col-sm-8">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-lg w-100 primary-button">Subscribe</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <ul class="list-unstyled">
            <li class="mb-3">
              <h5 class="mb-1">📬 Monthly Updates</h5>
              <p class="mb-0">Receive curated news on ZGF’s work, grants, and national governance developments.</p>
            </li>
            <li>
              <h5 class="mb-1">🔒 Privacy Respected</h5>
              <p class="mb-0">We value your privacy and only send relevant content. No spam—just meaningful updates.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  