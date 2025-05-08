@extends("admin.layout ")

@section("main")

{{-- Form Start --}}
<form id="createform" action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        {{-- Title --}}
        <div class=" col-md-6 mb-3">
            <label for="Category" class="form-label" style="font-weight: 700;">Category :</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" col-md-6 mb-3">
            <label for="clug" class="form-label" style="font-weight: 700;">slug :</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Submit --}}
    <button type="submit" class="btn btn-primary ">Submit Post</button>
</form>



@endsection