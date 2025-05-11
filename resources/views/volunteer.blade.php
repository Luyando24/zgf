@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h1 class="text-center mb-4 fw-bold">Volunteer With Us</h1>
                    <p class="text-center mb-5">Join our team of dedicated volunteers and make a difference in Zambian communities. Share your skills, time, and passion to support our initiatives.</p>
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ url('volunteer.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Personal Information -->
                            <div class="col-12">
                                <h4 class="fw-bold mb-3">Personal Information</h4>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                                    <label for="name">Full Name</label>
                                    <div class="invalid-feedback">
                                        Please provide your full name.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                    <label for="email">Email Address</label>
                                    <div class="invalid-feedback">
                                        Please provide a valid email address.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone" value="{{ old('phone') }}" required>
                                    <label for="phone">Phone Number</label>
                                    <div class="invalid-feedback">
                                        Please provide your phone number.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Your Address" value="{{ old('address') }}" required>
                                    <label for="address">Address</label>
                                    <div class="invalid-feedback">
                                        Please provide your address.
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Volunteer Information -->
                            <div class="col-12 mt-4">
                                <h4 class="fw-bold mb-3">Volunteer Information</h4>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="skills" name="skills" placeholder="Your Skills" style="height: 100px" required>{{ old('skills') }}</textarea>
                                    <label for="skills">Skills & Expertise</label>
                                    <div class="invalid-feedback">
                                        Please describe your skills and expertise.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="availability" name="availability" placeholder="Your Availability" style="height: 100px" required>{{ old('availability') }}</textarea>
                                    <label for="availability">Availability & Time Commitment</label>
                                    <div class="invalid-feedback">
                                        Please describe your availability.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="motivation" name="motivation" placeholder="Your Motivation" style="height: 150px" required>{{ old('motivation') }}</textarea>
                                    <label for="motivation">Why do you want to volunteer with us?</label>
                                    <div class="invalid-feedback">
                                        Please share your motivation for volunteering.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cv" class="form-label">Resume/CV (Optional)</label>
                                    <input class="form-control" type="file" id="cv" name="cv">
                                    <div class="form-text">Upload your CV in PDF, DOC, or DOCX format (max 2MB)</div>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #61A534; border-color: #61A534;">Submit Volunteer Application</button>
                                </div>
                                <p class="text-center mt-3 text-muted small">
                                    By submitting this form, you agree to our <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Bootstrap form validation
(function () {
    'use strict'
    
    // Fetch all forms that need validation
    var forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
@endsection
