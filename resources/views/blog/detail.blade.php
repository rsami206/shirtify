@extends('index')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="card shadow-sm ">
                <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2 class="mt-3">{{ $product->name }}</h2>
            <p class="text-muted"><strong>Category: </strong> {{ $product->category->name ?? 'N/A' }}</p>
            <div class=" align-items-center gap-2 mb-3">
                <h5 class="text-danger mb-0">
                <strong>Price: </strong>   {{ $product->discounted_price ?? $product->price  }} Rs/-
                    @if($product->discounted_price)
                    <sub class="text-muted">
                        <del> {{ $product->price }} Rs/-</del>
                    </sub>
                    @endif
                </h5>
            </div>




            <p><strong>In Stock: </strong> {{ $product->stock }}</p>
            <p><strong>Color: </strong> {{ ucfirst($product->color) }}</p>
            <p><strong>Size: </strong> {{ strtoupper($product->size) }}</p>
            

            <p class="mt-4"><strong>Description:</strong>{!! $product->description !!}</p>

            <form action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection