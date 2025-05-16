@extends('admin.layout')

@section('main')

        <!-- Analytics Cards -->
        <div class="row mt-4 mb-4 g-4">
          <!-- Orders Table -->
          <div class="card">
            <div class="card-header bg-white border-bottom">
              <strong>Recent Orders</strong>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>user_id</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>

                   @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->user->name }}</td>
                            <td>{{ $order->total_amount }}</td>
                            
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
                               <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No order found.</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
  

@endsection