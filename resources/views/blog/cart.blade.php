@extends('index')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-bordered text-center align-middle">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>Item</th>
                        <th>image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                    <tr>
                        <td>
                            <div>{{ $item['name'] }}</div>
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $item['image']) }}" width="60">

                        </td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">

                                <form action="{{ route('cart.update', $id) }}" method="POST" id="decrease-form-{{ $id }}" class="me-1">
                                    @csrf
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                    <a href="javascript:void(0);"
                                        onclick="submitFormWithoutHistory('decrease-form-{{ $id }}')"
                                        class="btn my-button {{ $item['quantity'] <= 1 ? 'disabled' : '' }}">
                                        −
                                    </a>

                                </form>

                                <span class="badge fs-5 text-dark mx-2 px-3 py-2 ">
                                    {{ $item['quantity'] }}
                                </span>

                                <form action="{{ route('cart.update', $id) }}" method="POST" id="increase-form-{{ $id }}" class="ms-1">
                                    @csrf
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                    <a href="javascript:void(0);"
                                        onclick="submitFormWithoutHistory('increase-form-{{ $id }}')"
                                        class="btn my-button">
                                        +
                                    </a>
                                </form>

                            </div>
                        </td>


                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">×</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
            <div class="bg-light p-4 rounded shadow-sm">
                <h5 class="fw-bold">CART SUMMARY</h5>
                <hr>
                <p>Subtotal: <span class="float-end">${{ $subtotal }}</span></p>
                <p>Shipping: <span class="float-end">${{ $shipping }}</span></p>
                <h5>Total: <span class="float-end">${{ $total }}</span></h5>
                <a href="{{route('orderplace')}}" class="btn btn-dark w-100 mt-3">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
@push('quantity-script')
<script>
    function submitFormWithoutHistory(formId) {
        const form = document.getElementById(formId);
        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        }).then(() => {
            window.location.replace(window.location.href); // no history entry
        });
    }

    function submitFormWithoutHistory(formId) {
        const form = document.getElementById(formId);
        if (!form) return;

        // Quantity check to avoid going below 1
        const quantityInput = form.querySelector('input[name="quantity"]');
        if (quantityInput && parseInt(quantityInput.value) < 1) {
            return; // Don't submit if quantity < 1
        }

        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        }).then(() => {
            window.location.replace(window.location.href);
        });
    }
</script>
@endpush
@endsection