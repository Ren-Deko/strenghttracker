@extends('layouts.app')

@section('styles')
<style>
    .hero-section {
        background: url('/path/to/your-hero-image.jpg') no-repeat center center/cover;
        color: #000000;
        height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .feature-icon {
        font-size: 3rem; /* Icon size */
        color: var(--bs-primary); /* Primary color from Bootstrap */
    }

    .feature-card {
        border: none;
        transition: transform .3s ease-in-out;
    }

    .feature-card:hover {
        transform: translateY(-10px);
    }

    .testimonial {
        background: #f8f9fa;
        padding: 20px;
        border-left: 5px solid var(--bs-primary);
    }

    .cta-section {
        background: var(--bs-dark);
        color: #fff;
        padding: 40px;
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <h1>Welcome to StrengthTracker</h1>
    <p>Track and optimize your workouts with precision and ease.</p>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
</div>

<!-- Features Section -->
<div class="container text-center my-5">
    <h2>Features</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card feature-card">
                <div class="card-body">
                    <i class="bi bi-graph-up feature-icon"></i>
                    <h3>Track Progress</h3>
                    <p>Monitor your improvements with interactive charts and detailed reports.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card">
                <div class="card-body">
                    <i class="bi bi-calendar-week feature-icon"></i>
                    <h3>Schedule Workouts</h3>
                    <p>Never miss a workout day with easy scheduling tools.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card">
                <div class="card-body">
                    <i class="bi bi-people feature-icon"></i>
                    <h3>Community</h3>
                    <p>Connect with other athletes and get motivated.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="container my-5">
    <h2>Testimonials</h2>
    <div class="testimonial">
        <p>"This app has changed the way I track my workouts and progress."</p>
        <footer>- Emily, Professional Trainer</footer>
    </div>
</div>

<!-- Call to Action Section -->
<div class="cta-section text-center">
    <h2>Join StrengthTracker Today</h2>
    <p>Start your fitness journey with us now!</p>
    <a href="{{ route('register') }}" class="btn btn-light btn-lg">Sign Up</a>
</div>
@endsection



