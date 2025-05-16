@extends('index')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Order #{{ $order->id }} Details</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p><strong>User ID:</strong> {{ $order->user_id }}</p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($order->status == 'pending') bg-warning 
                    @elseif($order->status == 'completed') bg-success 
                    @elseif($order->status == 'cancelled') bg-danger 
                    @else bg-secondary 
                    @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p><strong>Total Amount:</strong> Rs. {{ number_format($order->total_amount, 2) }}</p>
        </div>
    </div>

    <h4>Order Items</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm bg-white">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Shirt ID</th>
                    <th>Quantity</th>
                    <th>Price (Rs)</th>
                    <th>Subtotal (Rs)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->shirt_id }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
