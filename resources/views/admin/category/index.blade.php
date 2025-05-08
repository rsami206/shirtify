@extends("admin.layout")



@section("main")
{{-- Success Message --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h1>All categories</h1>
<a href="{{ route('cats.create') }}" class="btn btn-warning mb-3">Create category</a>
<table class="table table-bordered table-hover align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th><i class="fa fa-id-badge" aria-hidden="true"></i></th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cats as $cat )
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('cat.edit', $cat->id) }}" class="btn btn-sm btn-outline-primary">
                    <i class="ri-edit-line"></i>
                </a>
                <form action="{{ route('cat.delete', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
            <td colspan="4">No categories found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection