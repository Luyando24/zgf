<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\programController;
use App\Http\Controllers\ProgramDetailsController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UniversityDetails;
use App\Http\Controllers\UniversityDetailsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\FacebookPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PartnerRequestController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\CommunityInitiativeController;
use App\Http\Controllers\AbuseReportController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ResourceController;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
use App\Models\City;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/programs', [ProgramController::class, 'programs'])->name('programs');

Route::get('/membership-notice', [ProgramController::class, 'membershipNotice'])->name('membership-notice');
Route::get('/membership-application', [ProgramController::class, 'membershipApplication'])->name('membership-application');
//post route to submit new membership application
Route::post('/submit-membership-application', [MembershipController::class, 'submitMembershipApplication'])->name('membership.submit');
    
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program}', [ProgramDetailsController::class, 'ProgramDetails'])->name('program');
    
Route::get('/universities', [UniversityController::class, 'universities'])->name('universities');
Route::get('/university.details/{university}', [UniversityDetails::class, 'UniversityDetails'])->name('university');
// Programs (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    
});

// Display all cities
Route::get('/cities', [CityController::class, 'cities'])->name('cities');

// About page
Route::get('/about', [AboutController::class, 'about'])->name('about');

// Why us page
Route::get('/what-we-do', [HomeController::class, 'WhatWeDo'])->name('WhatWeDo');

// How We Do It page
Route::get('/how-we-do-it', [HomeController::class, 'howWeDoIt'])->name('howWeDoIt');

// Contact page
Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact');

// Send message from contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// view city
Route::get('/city/{city}', [CityController::class, 'cityDetails'])->name('city.view');

// Display news page
Route::get('/news', [PostController::class, 'newsPage'])->name('news');

// Display post details
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

// Display career page
Route::get('/careers', [PostController::class, 'careerPage'])->name('careers');
// Display career details
Route::get('/career/{career}', [PostController::class, 'careerDetails'])->name('job.show');
//submit job application
Route::post('/job/{career:slug}/apply', [JobApplicationController::class, 'store'])->name('job.apply');

// Facebook posts
Route::get('/facebook-posts', [FacebookPostController::class, 'index'])->name('facebook-posts');

// Newsletter routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::post('/newsletter/confirm-unsubscribe', [NewsletterController::class, 'confirmUnsubscribe'])->name('newsletter.confirm-unsubscribe');

// Impact page
Route::get('impact', [HomeController::class, 'impact'])->name('impact');

//Join page
Route::get('/get-involved', [HomeController::class, 'join'])->name('get-involved');

//partnship request page
Route::get('/partnership-request', [PartnerRequestController::class, 'index'])->name('partnership-request');
Route::post('/partnership-request', [PartnerRequestController::class, 'submitPartnerRequest'])->name('partnership.submit');

//Volunteer page
Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer');
Route::post('/volunteer.store', [VolunteerController::class, 'submitVolunteerRequest'])->name('volunteer.store');
Route::get('/volunteer/thank-you', [VolunteerController::class, 'thankYou'])->name('volunteer.thank-you');

//privacy policy page
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');

// Community Initiatives routes
Route::get('/initiatives', [CommunityInitiativeController::class, 'index'])->name('initiatives.index');
Route::get('/initiatives/{slug}', [CommunityInitiativeController::class, 'show'])->name('initiatives.show');

// Report Abuse routes
Route::get('/report', [AbuseReportController::class, 'create'])->name('report');
Route::post('/report', [AbuseReportController::class, 'store'])->name('report.store');
Route::get('/report/thank-you', [AbuseReportController::class, 'thankYou'])->name('reports.thank-you');

// Donation Routes
Route::get('/donate', [App\Http\Controllers\DonationController::class, 'index'])->name('donate');
Route::get('/donation/callback', [App\Http\Controllers\DonationController::class, 'handleCallback'])->name('donation.callback');
Route::get('/donation/thank-you', [App\Http\Controllers\DonationController::class, 'thankYou'])->name('donation.thank-you');
Route::resource('resources', ResourceController::class);
Route::get('/resources/{resource:slug}', [ResourceController::class, 'show'])->name('resources.show');
Route::get('/resources/{resource:slug}/download', [ResourceController::class, 'download'])->name('resources.download');




