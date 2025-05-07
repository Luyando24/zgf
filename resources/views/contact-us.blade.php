@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="container my-5">
  <h2 class="heading text-center mb-4">Get in Touch with ZGF</h2>
  <p class="text-muted text-center mb-5" style="max-width: 700px; margin: 0 auto;">
    We'd love to hear from you. Whether you're a civil society organization, a partner, or a curious citizen—reach out and let’s connect.
  </p>

  <div class="row g-5 align-items-start">
    <!-- Contact Form -->
    <div class="col-lg-6">
      <form action="{{ route('contact.submit') }}" method="POST" class="shadow rounded-4 p-4 bg-white">
        @csrf

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
          <label for="name" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn primary-button w-100">Send Message</button>
      </form>
    </div>

    <!-- Contact Details -->
    <div class="col-lg-6">
      <div class="bg-light rounded-4 p-4 shadow-sm">
        <h5 class="mb-3">Zambian Governance Foundation</h5>

        <p class="mb-2"><strong>Office Address:</strong><br>
          Plot 35B, Great East Road<br>
          Lusaka, Zambia
        </p>

        <p class="mb-2"><strong>Email:</strong><br>
          <a href="mailto:info@zgf.org.zm" class="text-decoration-none text-primary">info@zgf.org.zm</a>
        </p>

        <p class="mb-2"><strong>Phone:</strong><br>
          +260 211 259784 / 259748
        </p>

        <p class="mb-0"><strong>Working Hours:</strong><br>
          Monday – Friday: 08:00 – 17:00 <br>
          Closed on weekends and public holidays
        </p>
      </div>

      <!-- Google Map -->
      <div class="mt-4 rounded-4 overflow-hidden shadow-sm">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.7903298997257!2d28.308260374723093!3d-15.406949951398562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19408c0d0af61c01%3A0xa5f92e3a6261c33!2sZambian%20Governance%20Foundation!5e0!3m2!1sen!2szm!4v1714499006375"
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<x-newsletter />
@endsection
