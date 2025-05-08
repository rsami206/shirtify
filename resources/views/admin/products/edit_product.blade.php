@extends('admin.layout')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

@endpush
@section('main')
<div class="row mt-4 mb-4 g-4">
    <div class="card mb-4">
        <div class="container">
          <h2 class="my-3 text-center text-uppercase">Add New Shirt</h2>
           
           {{-- Global Error Messages --}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="createform" action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                 {{-- Category (Full Width) --}}
                   <div class="mb-3">
                      <label for="category_id" class="form-label" style="font-weight: 700;">Category</label>
                      <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                               <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                  {{ $category->name }}
                               </option>
                            @endforeach
                        </select>
                        @error('category_id') 
                          <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                    </div>

                  {{-- Name and Slug (50% each) --}}
                    <div class="row">
                      <div class="col-md-6 mb-3">
                            <label for="name" class="form-label" style="font-weight: 700;">Shirt Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label" style="font-weight: 700;">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$product->slug }}" required>
                             @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Description (Full Width) --}}
                    <div class="mb-3">
                       <label for="description" class="form-label" style="font-weight: 700;">Description</label>
                        <textarea id="description" name="description" class="d-none form-control @error('description') is-invalid @enderror" rows="3" value="{{$product->description }}"></textarea>
                       <div id="editor" class="bg-light" style="height: 250px"></div>
                    </div>

                    {{-- Price and Discounted Price --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label" style="font-weight: 700;">Price (₨)</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" value="{{ $product->price }}" required>
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="discounted_price" class="form-label" style="font-weight: 700;">Discounted Price (₨)</label>
                            <input type="number" name="discounted_price" id="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" step="0.01" value="{{ $product->discounted_price }}">
                            @error('discounted_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    {{-- Stock and Size --}}
                    <div class="row">
                       <div class="col-md-6 mb-3">
                          <label for="stock" class="form-label" style="font-weight: 700;">Stock</label>
                          <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $product->stock }}" required>
                           @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>
                       <div class="col-md-6 mb-3">
                         <label for="size" class="form-label" style="font-weight: 700;">Size</label>
                           <select name="size" id="size" class="form-select @error('size') is-invalid @enderror" required>
                               @foreach(['S', 'M', 'L', 'XL'] as $size)
                                  <option value="{{ $size }}" {{ $product->size == $size ? 'selected' : '' }}>{{ $size }}</option>
                               @endforeach
                           </select>
                            @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                  {{-- Color and Image --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="color" class="form-label" style="font-weight: 700;">Color</label>
                            <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ $product->color }}">
                            @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label" style="font-weight: 700;">Shirt Image</label>
                        <input type="file" name="image" id="image_path" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                <button type="submit" class="btn btn-primary my-2 w-25 ">Add Shirt</button>
            </form>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });

    document.querySelector('#createform').addEventListener('submit', function(e){
        e.preventDefault();
        const textarea = document.querySelector('#description');
        const html = quill.getSemanticHTML();
        textarea.value = html;
        document.querySelector("#createform").submit();
    });
  </script>
@endpush
@endsection