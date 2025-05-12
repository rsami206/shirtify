@extends('index')

@section('content')
<section class="py-5 bg-white" id="testimonials">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">What Our Customers Say</h2>
            <p class="text-muted">Real feedback from our happy Shirtify shoppers.</p>
        </div>
        <div class="row g-4">
            @foreach ([
                ['name' => 'Emily R.', 'quote' => 'Shirtify has the best shirt collection I’ve ever seen! Great quality and fast delivery.', 'img' => 'https://randomuser.me/api/portraits/women/44.jpg'],
                ['name' => 'Jason T.', 'quote' => 'The smart filters made finding what I wanted so easy. Will shop again!', 'img' => 'https://randomuser.me/api/portraits/men/32.jpg'],
                ['name' => 'Sara B.', 'quote' => 'Customer service was amazing and I loved how smooth checkout was.', 'img' => 'https://randomuser.me/api/portraits/women/68.jpg'],
            ] as $testimonial)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <img src="{{ $testimonial['img'] }}" class="rounded-circle mb-3" width="80" height="80" alt="{{ $testimonial['name'] }}">
                        <blockquote class="blockquote mb-3">
                            <p class="mb-0">“{{ $testimonial['quote'] }}”</p>
                        </blockquote>
                        <footer class="blockquote-footer">{{ $testimonial['name'] }}</footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
