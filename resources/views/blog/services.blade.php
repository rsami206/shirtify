@extends('index')

@section('content')

<section class="py-5 bg-light" id="our-services">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Services</h2>
            <p class="text-muted">Shirtify – A modern e-commerce experience built with Laravel & Bootstrap 5</p>
        </div>
        <div class="row g-4">
            @foreach ([
                ['icon' => 'bi-bag-check', 'title' => 'Premium Shirt Collection', 'desc' => 'Wide variety of stylish shirts for every occasion.'],
                ['icon' => 'bi-funnel', 'title' => 'Smart Search & Filtering', 'desc' => 'Find the perfect shirt with our advanced filters.'],
                ['icon' => 'bi-shield-lock', 'title' => 'Secure Payments', 'desc' => 'Encrypted and safe checkout powered by Laravel.'],
                ['icon' => 'bi-truck', 'title' => 'Fast Shipping', 'desc' => 'Nationwide delivery with real-time tracking.'],
                ['icon' => 'bi-arrow-repeat', 'title' => 'Easy Returns', 'desc' => 'Simple return policy for a stress-free experience.'],
                ['icon' => 'bi-phone', 'title' => 'Mobile-Friendly', 'desc' => 'Responsive shopping across all devices.'],
            ] as $service)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="{{ $service['icon'] }} fs-1 text-primary mb-3"></i>
                            <h5 class="fw-semibold">{{ $service['title'] }}</h5>
                            <p class="text-muted">{{ $service['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection