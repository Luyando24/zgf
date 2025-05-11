@extends('layouts.app')

@section('title', 'Partnership Request')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <h1 class="display-5 fw-bold mb-3">Partner With Us</h1>
            <p class="lead">Join us in strengthening civil society and promoting good governance across Zambia. Fill out the form below to start a conversation about partnership opportunities.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('partnership.submit') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    Please provide your full name.
                                </div>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Organization Name -->
                            <div class="col-md-6">
                                <label for="organization" class="form-label">Organization Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" name="organization" required>
                                <div class="invalid-feedback">
                                    Please provide your organization name.
                                </div>
                                @error('organization')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Email Address -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                @error('phone')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Partnership Type -->
                            <div class="col-12">
                                <label for="partnership_type" class="form-label">Type of Partnership <span class="text-danger">*</span></label>
                                <select class="form-select @error('partnership_type') is-invalid @enderror" id="partnership_type" name="partnership_type" required>
                                    <option value="" selected disabled>Select partnership type...</option>
                                    <option value="Funding/Grants">Funding/Grants</option>
                                    <option value="Capacity Building">Capacity Building</option>
                                    <option value="Technical Support">Technical Support</option>
                                    <option value="Joint Projects/Programs">Joint Projects/Programs</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a partnership type.
                                </div>
                                @error('partnership_type')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Message / Partnership Proposal -->
                            <div class="col-12">
                                <label for="message" class="form-label">Message / Partnership Proposal <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide details about your partnership proposal.
                                </div>
                                @error('message')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Document Upload -->
                            <div class="col-12">
                                <label for="document" class="form-label">Attach Proposal Document (PDF, max 2MB)</label>
                                <input type="file" class="form-control @error('document') is-invalid @enderror" id="document" name="document" accept="application/pdf">
                                <div class="form-text">Optional: Upload a detailed proposal document in PDF format.</div>
                                @error('document')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="{{ url('terms') }}" target="_blank">terms and conditions</a> <span class="text-danger">*</span>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree to the terms and conditions.
                                    </div>
                                    @error('terms')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100" style="background-color: #61A534; border-color: #61A534;">
                                    Submit Partnership Request
                                </button>
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
