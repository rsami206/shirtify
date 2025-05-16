@extends('index')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm bg-white text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Total Price (Rs)</th>
                    <th>Total Quantity</th>
                <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                       
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            {{ $order->items->sum('quantity') }}
                        </td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>

                        <td>
                            <span class="badge 
                                @if($order->status == 'pending') bg-warning 
                                @elseif($order->status == 'completed') bg-success 
                                @elseif($order->status == 'cancelled') bg-danger 
                                @else bg-secondary 
                                @endif
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-eye"></i>  View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
