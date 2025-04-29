@extends('admin.layout')

@section('main')

        <!-- Analytics Cards -->
        <div class="row mt-4 mb-4 g-4">
  
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
        </div>
  

@endsection