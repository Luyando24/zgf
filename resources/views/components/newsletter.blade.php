<section class="newsletter-section bg-dark py-5 text-white" style="margin-bottom: -25px">
  <!-- Success Modal -->
@if(session('success'))
<div class="modal-overlay wow animate__animated animate__fadeIn" id="subscribeModal">
  <div class="modal-content animate__animated animate__bounceIn">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <h4>{{ session('success') }}</h4>
    <p>Thank you for joining our community!</p>
    <button class="btn modal-button mt-3" onclick="closeModal()">Close</button>
  </div>
</div>



<!-- Script to Close Modal -->
<script>
  function closeModal() {
    document.getElementById('subscribeModal').style.display = 'none';
  }

  // Optional: Automatically close modal after 5 seconds
  setTimeout(() => {
    const modal = document.getElementById('subscribeModal');
    if (modal) modal.style.display = 'none';
  }, 5000);
</script>
@endif
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <h2 class="mb-3">Subscribe to Our Newsletter</h2>
          <p class="mb-4">
            Stay connected with the Zambian Governance Foundation. Get the latest updates on funding opportunities, governance initiatives, community stories, and civil society insights—delivered straight to your inbox.
          </p>
          <form action="{{ route('newsletter.subscribe') }}" method="POST" enctype="multipart/form-data" class="row g-2">
            @csrf
            <div class="col-12 col-sm-8">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-lg w-100 primary-button" style="border-radius: 10px;">Subscribe</button>
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
  