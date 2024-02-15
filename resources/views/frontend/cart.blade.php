@extends('frontend.layouts.app')
@section('title', 'Old Club Man')
@section('body-attr', 'style="background-color: #ebebf2;"')
@section('content')
<style>
    .checkout {
        background-color: #F85606;
    }

    .checkout:hover {
        background-color: #2F0549;
    }
</style>
<!-- Cart Section Starts Here -->
<div class="container my-5">
    @if (session('cart'))
    <div class="row">
        <div class="col-lg-8">
            <h4 class="cart-area__label text-center">{{ count(session('cart', [])) }} Service in Cart</h4>
            <div class="">
                @php $total = 0 @endphp
                @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                @php $total += $details['price'] * $details['qty'] @endphp
                <div class="card shadow-lg p-3 mb-2">
                    <div class="row cart-wizard-area">
                        <div class="col-sm-4 image">
                        @if (isset($details['image']) && !empty($details['image']))
                            <img src="{{ asset('public/uploads/printimages/' . $details['image']) }}" alt="" width="150px">
                        @endif
                        </div>
                        <div class="col-sm-8 text">
                            <h5>{{ $details['service_name'] }}</h5>
                            <div class="bottom-wizard d-flex justify-content-between align-items-center">
                                <p>
                                    {{ $details['price'] ? '$' . $details['price'] : 'Free' }}
                                </p>
                                <div class="quantity-buttons">
                                    <button class="btn btn-sm btn-outline-primary py-0" data-id="{{ $id }}" data-action="decrease">-</button>
                                    <span class="quantity">{{ $details['qty'] }}</span>
                                    <button class="btn btn-sm btn-outline-primary py-0" data-id="{{ $id }}" data-action="increase">+</button>
                                </div>
                                <div class="trash-icon">
                                    <a href="#" class="remove-from-cart" data-id="{{ $id }}">
                                        <i class="far fa-trash-alt remove-from-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <h4 class="cart-area__label text-center">Summery</h4>
            <div class="card shadow-lg p-3">
                <div class="summery-wizard">
                    <div class="summery-wizard-text d-flex pt-0">
                        <h6>Subtotal</h6>
                        <p class="ms-auto"> {{ '$' . number_format((float) session('cart_details')['cart_total'], 2) }}</p>
                    </div>
                    <div class="summery-wizard-text d-flex">
                        <h6>Coupon Discount ({{ session('cart_details')['discount'] ?? 0.00 }}%)</h6>
                        <p class="ms-auto">{{ '$' . number_format((float) isset(session('cart_details')['discount_amount']) ? session('cart_details')['discount_amount'] : 0.00, 2) }}</p>
                    </div>

                    <!-- <div class="summery-wizard-text d-flex">
                        <h6>Taxes (15%)</h6>
                        <p class="ms-auto"> {{ '$' . number_format((float) session('cart_details')['tax'], 2) }}</p>
                    </div> -->

                    <div class="total-wizard d-flex">
                        <h6 class="font-title--card">Total:</h6>
                        <p class="font-title--card ms-auto">{{ '$' . number_format((float) session('cart_details')['total_amount'], 2) }}</p>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <a href="{{ route('checkout') }}" class="btn btn-lg checkout form-control mb-lg-3 text-white">Checkout</a>
                        <!-- <label for="coupon">Apply Coupon</label>
                        <div class="input-group">
                            <input type="text" name="coupon" class="form-control" placeholder="Coupon Code" id="coupon" />
                            <button type="submit" class="sm-button bg-info">Apply</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container text-center">
        <h1>Your Cart is Empty</h1>
        <h5>No Courses in Your Cart Yet</h5>
    </div>
    @endif
</div>
<!-- Cart Section Ends Here -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.data('id') // Use data-id attribute
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

        $('.quantity-buttons button').click(function(e) {
            e.preventDefault();
            var action = $(this).data('action');
            var id = $(this).data('id');
            var currentQuantity = parseInt($('.quantity[data-id="' + id + '"]').text());
            var newQuantity = action === 'increase' ? currentQuantity + 1 : Math.max(currentQuantity - 1, 1); // Ensure quantity is never below 1
            $('.quantity[data-id="' + id + '"]').text(newQuantity);

            // Send AJAX request to update session data
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: 'POST',
                data: {
                    id: id,
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log(response); // Handle success response
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Handle error response
                }
            });
        });
    });
</script>
@endpush
