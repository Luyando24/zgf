@extends('layouts.app')

@section('title', 'Report Abuse or Raise Awareness')

@section('content')
<!-- Hero Section -->
<section class="bg-primary-custom text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="fw-bold mb-3">Report Abuse or Raise Awareness</h1>
                <p class="lead mb-0">Help shine a light on injustice. Your voice matters in creating a more just and equitable society.</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Area with Improved Background -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Information Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="card-body p-4 p-md-5">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h4 class="fw-bold mb-3 text-primary-dark">Why Report?</h4>
                                <p>Your report can help:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Expose injustice and corruption</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Protect vulnerable individuals</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Drive systemic change</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Hold perpetrators accountable</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Raise awareness about important issues</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4 class="fw-bold mb-3 text-primary-dark">What Happens Next?</h4>
                                <ol class="ps-3">
                                    <li class="mb-2">Our team reviews your report</li>
                                    <li class="mb-2">We may contact you for additional information</li>
                                    <li class="mb-2">We work with relevant authorities or partners when appropriate</li>
                                    <li class="mb-2">We take action based on the nature and severity of the issue</li>
                                    <li class="mb-2">We provide updates on significant developments if contact information is provided</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle-fill fs-4 me-2"></i>
                            <div>
                                <strong>Your safety matters.</strong> If you're reporting an emergency or a situation requiring immediate assistance, please contact local authorities directly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Form Card with Improved Contrast -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-4 bg-white">
                    <div class="card-header bg-primary-custom text-white p-4">
                        <h2 class="card-title fw-bold mb-0 text-center">Submit Your Report</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <h6 class="alert-heading fw-bold">Please fix the following errors:</h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            
                            <!-- Hidden fields for IP and Location -->
                            <input type="hidden" name="ip_address" id="ip_address">
                            <input type="hidden" name="user_location" id="user_location">
                            
                            <!-- Anonymous Reporting Option -->
                            <div class="form-check form-switch mb-4 p-3 bg-light rounded-3 border">
                                <input class="form-check-input" type="checkbox" id="is_anonymous" name="is_anonymous" value="1" onchange="toggleAnonymous(this.checked)" {{ old('is_anonymous') ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="is_anonymous">Submit anonymously</label>
                                <div class="form-text mt-1">If checked, we won't collect your personal information, but we also won't be able to follow up with you.</div>
                            </div>
                            
                            <!-- Personal Information Section -->
                            <div id="personal_info_section" class="{{ old('is_anonymous') ? 'd-none' : '' }}">
                                <div class="card mb-4 border-primary-light">
                                    <div class="card-header bg-primary-light text-dark">
                                        <h5 class="fw-bold mb-0">Your Information</h5>
                                    </div>
                                    <div class="card-body bg-white">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label fw-semibold">Phone Number (Optional)</label>
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Report Details Section -->
                            <div class="card mb-4 border-primary-light">
                                <div class="card-header bg-primary-light text-dark">
                                    <h5 class="fw-bold mb-0">Report Details</h5>
                                </div>
                                <div class="card-body bg-white">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="report_type" class="form-label fw-semibold">Type of Report <span class="text-danger">*</span></label>
                                            <select class="form-select @error('report_type') is-invalid @enderror" id="report_type" name="report_type" required>
                                                <option value="" selected disabled>Select a category</option>
                                                <option value="abuse" {{ old('report_type') == 'abuse' ? 'selected' : '' }}>Abuse (Physical, Emotional, Sexual)</option>
                                                <option value="discrimination" {{ old('report_type') == 'discrimination' ? 'selected' : '' }}>Discrimination</option>
                                                <option value="corruption" {{ old('report_type') == 'corruption' ? 'selected' : '' }}>Corruption</option>
                                                <option value="human_rights_violation" {{ old('report_type') == 'human_rights_violation' ? 'selected' : '' }}>Human Rights Violation</option>
                                                <option value="environmental_issue" {{ old('report_type') == 'environmental_issue' ? 'selected' : '' }}>Environmental Issue</option>
                                                <option value="other" {{ old('report_type') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('report_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="location" class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="City, Province, or Specific Location" required>
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Brief title for your report" required>
                                            @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="description" class="form-label fw-semibold">Detailed Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Please provide as much detail as possible, including what happened, when it happened, who was involved, and any other relevant information." required>{{ old('description') }}</textarea>
                                            <div class="form-text">Minimum 50 characters. Your detailed account helps us understand the situation better.</div>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="evidence_file" class="form-label fw-semibold">Supporting Evidence (Optional)</label>
                                            <input type="file" class="form-control @error('evidence_file') is-invalid @enderror" id="evidence_file" name="evidence_file">
                                            <div class="form-text">You can upload documents, images, or other files that support your report (max 10MB). Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG.</div>
                                            @error('evidence_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Consent and Privacy Section -->
                            <div class="card mb-4 border-primary-light">
                                <div class="card-header bg-primary-light text-dark">
                                    <h5 class="fw-bold mb-0">Consent and Privacy</h5>
                                </div>
                                <div class="card-body bg-white">
                                    <div class="form-check">
                                        <input class="form-check-input @error('consent') is-invalid @enderror" type="checkbox" id="consent" name="consent" required>
                                        <label class="form-check-label" for="consent">
                                            I understand that the information provided will be used to investigate the reported issue and may be shared with relevant authorities if necessary. <span class="text-danger">*</span>
                                        </label>
                                        @error('consent')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Security Check -->
                            <div class="card mb-4 border-warning">
                                <div class="card-header bg-warning-light text-dark">
                                    <h5 class="fw-bold mb-0">Security Check</h5>
                                </div>
                                <div class="card-body bg-white">
                                    <p class="card-text">Please answer this question to help us prevent automated submissions.</p>
                                    <div class="mb-0">
                                        <label for="security_question" class="form-label fw-semibold">What is the capital city of Zambia? <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('security_question') is-invalid @enderror" id="security_question" name="security_question" required>
                                        @error('security_question')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold">Submit Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Resources Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="fw-bold mb-4 text-center text-primary-dark">Additional Resources</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-danger text-white me-3">
                                        <i class="bi bi-shield"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Emergency Services</h5>
                                </div>
                                <p class="card-text">If you're in immediate danger, please contact emergency services.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Police:</strong> 991</li>
                                    <li class="mb-2"><strong>Ambulance:</strong> 992</li>
                                    <li class="mb-2"><strong>Fire:</strong> 993</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-primary text-white me-3">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Helplines</h5>
                                </div>
                                <p class="card-text">These organizations provide support and guidance for various issues.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Child Helpline:</strong> 116</li>
                                    <li class="mb-2"><strong>GBV Helpline:</strong> 5950</li>
                                    <li class="mb-2"><strong>Mental Health:</strong> +260 97X XXX XXX</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-success text-white me-3">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Legal Aid</h5>
                                </div>
                                <p class="card-text">Organizations that can provide legal assistance and advice.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Legal Aid Board:</strong> +260 21X XXX XXX</li>
                                    <li class="mb-2"><strong>Human Rights Commission:</strong> +260 21X XXX XXX</li>
                                    <li class="mb-2"><strong>Anti-Corruption Commission:</strong> +260 21X XXX XXX</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-newsletter />
@endsection

@push('styles')
<style>
    /* Primary colors */
    .bg-primary-custom {
        background-color: #4a6baf;
    }
    
    .text-primary-dark {
        color: #3a5a9f;
    }
    
    .bg-primary-light {
        background-color: #e9effc;
    }
    
    .border-primary-light {
        border: 1px solid #c5d5f5;
    }
    
    .bg-warning-light {
        background-color: #fff8e6;
    }
    
    /* Form elements */
    .form-control, .form-select {
        border: 1px solid #ced4da;
        padding: 0.625rem 0.75rem;
    }
    
    .form-control:focus, .form-select:focus, .form-check-input:focus {
        border-color: #4a6baf;
        box-shadow: 0 0 0 0.25rem rgba(74, 107, 175, 0.25);
    }
    
    .form-check-input:checked {
        background-color: #4a6baf;
        border-color: #4a6baf;
    }
    
    /* Buttons */
    .btn-primary {
        background-color: #4a6baf;
        border-color: #4a6baf;
    }
    
    .btn-primary:hover, .btn-primary:focus {
        background-color: #3a5a9f;
        border-color: #3a5a9f;
    }
    
    /* Icons */
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@push('scripts')
<script>
    function toggleAnonymous(isAnonymous) {
        const personalInfoSection = document.getElementById('personal_info_section');
        
        if (isAnonymous) {
            personalInfoSection.classList.add('d-none');
            
            // Clear and disable required fields
            document.getElementById('name').value = '';
            document.getElementById('name').removeAttribute('required');
            
            document.getElementById('email').value = '';
            document.getElementById('email').removeAttribute('required');
            
            document.getElementById('phone').value = '';
        } else {
            personalInfoSection.classList.remove('d-none');
            
            // Re-enable required fields
            document.getElementById('name').setAttribute('required', '');
            document.getElementById('email').setAttribute('required', '');
        }
    }
    
    // Form validation
    (function () {
        'use strict'
        
        // Fetch all forms we want to apply custom validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
<script>
    // Get IP Address
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            document.getElementById('ip_address').value = data.ip;
        })
        .catch(error => console.error('Error fetching IP:', error));

    // Get Location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const location = `${position.coords.latitude},${position.coords.longitude}`;
                document.getElementById('user_location').value = location;
            },
            function(error) {
                console.error('Error getting location:', error);
            }
        );
    }
</script>
</body>
</html>
@endpush

