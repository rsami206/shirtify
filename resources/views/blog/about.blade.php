@extends('index')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">About Shirtify</h2>

    <p class="lead text-center">
        At <strong>Shirtify</strong>, we believe style and comfort should go hand in hand. Our passion is crafting high-quality shirts that suit every personality — from classic cuts to modern designs.
    </p>

    <hr class="my-5">

    <!-- Mission Section -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h4>Our Mission</h4>
            <p>
                Our mission is to redefine everyday fashion by making premium-quality shirts accessible and affordable. We aim to blend modern style with timeless craftsmanship to help individuals express their identity confidently.
            </p>
        </div>
        <div class="col-md-6">
            <h4>Our Values</h4>
            <ul>
                <li>✔️ Quality First – We never compromise on fabric or fit</li>
                <li>✔️ Customer Satisfaction – Your happiness is our success</li>
                <li>✔️ Innovation – Style evolves, and so do we</li>
                <li>✔️ Integrity – Honesty and transparency in every order</li>
            </ul>
        </div>
    </div>

    <!-- Timeline / Story -->
    <div class="mb-5">
        <h4 class="mb-3">Our Journey</h4>
        <div class="timeline">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>2019:</strong> Shirtify was founded with a vision to create modern, breathable shirts for young professionals.</li>
                <li class="list-group-item"><strong>2020:</strong> Launched our first full collection online and grew to 1,000+ customers in our first year.</li>
                <li class="list-group-item"><strong>2022:</strong> Expanded to sportswear and casuals while maintaining our signature quality.</li>
                <li class="list-group-item"><strong>Today:</strong> We're one of the fastest-growing online shirt brands in the region with loyal customers worldwide.</li>
            </ul>
        </div>
    </div>

    <!-- Team Section (Optional) -->
    <div class="mb-5">
        <h4 class="mb-4">Meet Our Team</h4>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Ahsan Ali</h5>
                        <p class="card-text">Founder & Creative Director</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Fatima Khan</h5>
                        <p class="card-text">Head of Marketing</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">Usman Raza</h5>
                        <p class="card-text">Lead Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact / Call to Action -->
    <div class="text-center mt-5">
        <h5>Have questions or want to work with us?</h5>
        <p>Reach out to <a href="mailto:support@shirtify.com">support@shirtify.com</a> or call +92 123 4567890.</p>
        <a href="{{ route('contact.show') }}" class="btn btn-outline-primary mt-2">Contact Us</a>
    </div>
</div>
@endsection
