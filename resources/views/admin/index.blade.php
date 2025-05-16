@extends('admin.layout')

@section('main')

        <!-- Analytics Cards -->
        <div class="row mt-4 mb-4 g-4">
            <div class="col-md-3">
              <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="text-muted">Orders</h6>
                    <h4>{{$order}}</h4>
                  </div>
                  <i class="ri-shopping-cart-line card-icon"></i>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="text-muted">Revenue</h6>
                    <h4>$8,452</h4>
                  </div>
                  <i class="ri-money-dollar-circle-line card-icon"></i>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="text-muted">Products</h6>
                    <h4>{{$products}}</h4>
                  </div>
                  <i class="ri-shirt-line card-icon"></i>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="text-muted">Customers</h6>
                    <h4>{{$user}}</h4>
                  </div>
                  <i class="ri-user-line card-icon"></i>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Product Table -->
          <div class="card mb-4">
            <div class="card-header bg-white border-bottom">
              <strong>Recent Products</strong>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Basic Black Shirt</td>
                    <td>Casual</td>
                    <td>20</td>
                    <td>$25.00</td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary"><i class="ri-edit-line"></i></button>
                      <button class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
  
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
@endsection