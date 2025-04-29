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
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1024</td>
                    <td>Sarah Ahmad</td>
                    <td>$49.99</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td>2025-04-28</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
  

@endsection