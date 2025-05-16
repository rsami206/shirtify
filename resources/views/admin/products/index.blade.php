@extends('admin.layout')

@section('main')

{{-- Success Message --}}
    @if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
    @endif
<!-- Analytics Cards -->
<div class="row mt-4 mb-4 g-4">

    <!-- Product Table -->
    <div class="card mb-4">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <strong>Recent Products</strong>
            <a href="{{ route('admin.products.create') }}" class="btn btn-warning btn-sm">Create Shirt</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>
                            @if($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 60px; height: auto;" class="img-thumbnail">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </td>
                            <td>{{ $product->stock }}</td>
                            <td>₨{{ number_format($product->price, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
