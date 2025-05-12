@extends('index')

@section('content')

<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>@if ($category) in <i>{{$category}}</i> @endif
         </h2>
      </div>
      <div class="row">
         @foreach ($products as $product )
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box position-relative">
               <!-- Heart icon -->
               <div class="heart-icon">
                  <i class="ri-heart-line"></i>
               </div>

               <div class="option_container">
                  <div class="options">
                     <!-- {{-- Success Message --}}
                     @if(session('success'))
                     <div class="alert alert-success mt-2">
                        {{ session('success') }}
                     </div>
                     @endif -->
                     <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class=" option1">Add to Cart <i class="bi bi-cart"></i></button>
                     </form>



                     <a href="" class="option2">Buy Now</a>
                     <a href="{{route('shop.detail', $product->slug)}}" class="option3">Details</a>

                  </div>
               </div>
               <div class="img-box">
                  <img src="{{ asset('storage/' . $product->image_path) }}" alt="">
               </div>

               <div class="detail-box">
                  <h5>{{$product->name}}</h5>

                  <div class="product-price"><strong>Price : </strong>
                     @if($product->discounted_price && $product->discounted_price < $product->price)
                        <span class="text-danger fw-bold"> {{ number_format($product->discounted_price, 2) }}Rs/-</span>
                        @else
                        <span class="fw-bold">{{ number_format($product->price, 2) }}Rs/-</span>
                        @endif
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="btn-box">
         <a href="/">
            View All products
         </a>
      </div>
   </div>
</section>
@push('script')
<script>
   document.addEventListener("DOMContentLoaded", function() {
      const hearts = document.querySelectorAll(".heart-icon i");

      hearts.forEach((heart) => {
         heart.addEventListener("click", function() {
            if (heart.classList.contains("ri-heart-line")) {
               heart.classList.remove("ri-heart-line");
               heart.classList.add("ri-heart-fill");
            } else {
               heart.classList.remove("ri-heart-fill");
               heart.classList.add("ri-heart-line");
            }
         });
      });
   });
</script>
@endpush
<!-- end product section -->
@endsection