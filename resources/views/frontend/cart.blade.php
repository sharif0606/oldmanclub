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
                <div class="col-lg-12">
                    <h5 class="text-center">Cart Details</h5>
                    <h6 class="cart-area__label text-center">{{ count(session('cart', [])) }} Printing Service in Cart</h6>
                    <div class="">
                        @php
                            $total = 0;
                            //echo '<pre>';
                            $cart = session()->get('cart');
                            //print_r($cart);die;
                        @endphp
                        @foreach ($cart as $c)
                            @php
                                $total += $c['price'] * $c['quantity'];
                            @endphp
                        @endforeach
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                /*print_r(session()->get('cart'));*/
                                            @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if (isset($details['image']) && !empty($details['image']))
                                                                <img src="{{ asset('public/uploads/printimages/' . $details['image']) }}"
                                                                    alt="" width="150px">
                                                            @endif
                                                            {{ $details['service_name'] }}
                                                            <div class="d-flex">
                                                                <form action="{{ route('addto_cart', $id) }}">
                                                                    <input type="hidden" name="type" value="1">
                                                                    <input name="quantity" type="hidden" value="1">
                                                                    <input type="submit" name="op" value="+"
                                                                        style="padding:2px 8px;"
                                                                        class="btn btn-sm btn-primary">
                                                                    <input type="submit" name="op" value="-"
                                                                        style="padding:2px 8px;"
                                                                        class="btn btn-warning btn-sm">

                                                                </form>

                                                                <form method="POST"
                                                                    action="{{ route('remove.from.cart') }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $id }}">
                                                                    <button type="submit" style="padding:2px 8px;"
                                                                        class="mx-1 btn btn-danger btn-sm"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </div>



                                                            {{-- <button class="btn btn-sm btn-outline-primary py-0 left dec_{{ $id }}" onclick="qty_decrement({{ $id }})">-</button> --}}
                                                            {{-- <span class="quantity">{{ $details['quantity'] }}</span> --}}
                                                            {{-- <input class="count-number-input qty_{{ $id }}" type="hidden" value="1"> 
                                                                <button class="btn btn-sm btn-outline-primary py-0 right inc_{{ $id }}" onclick="qty_increment({{ $id }})">+</button> --}}
                                                        </td>
                                                        <td>{{ $details['price'] }}</td>
                                                        <td>{{ $details['quantity'] }}</td>
                                                        <td>{{ $details['quantity'] * $details['price'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-lg p-3">
                                    <div class="summery-wizard">
                                        <div class="summery-wizard-text d-flex pt-0">
                                            <h6>Subtotal</h6>
                                            <p class="ms-auto">
                                                {{ '$' . number_format((float) session('cart_details')['cart_total'], 2) }}
                                            </p>
                                        </div>
                                        <div class="summery-wizard-text d-flex">
                                            <h6>Coupon Discount ({{ session('cart_details')['discount'] ?? 0.0 }}%)</h6>
                                            <p class="ms-auto">
                                                {{ '$' . number_format((float) isset(session('cart_details')['discount_amount']) ? session('cart_details')['discount_amount'] : 0.0, 2) }}
                                            </p>
                                        </div>



                                        <div class="total-wizard d-flex">
                                            <h6 class="font-title--card">Total:</h6>
                                            <p class="font-title--card ms-auto">
                                                {{ '$' . number_format((float) session('cart_details')['total_amount'], 2) }}
                                            </p>
                                        </div>
                                        <form action="" method="post">
                                            @csrf
                                            <a href="{{ route('checkout') }}"
                                                class="btn btn-lg checkout form-control mb-lg-3 text-white">Checkout</a>
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
        function qty_increment(inc) {
            var qty_inc = $('.qty_' + inc).val();
            alert(qty_inc);
            //add_to_cart(inc, 'inc')
        }

        function qty_decrement(dec) {
            var qty_dec = $('.qty_' + dec).val();
            //add_to_cart(dec, 'dec');
        }

        function add_to_cart(id, op) {
            var data = '';
            var type = '';
            $.ajax({
                dataType: "json",
                url: '{{ route('addto_cart', "'+id+'") }}',
                method: "get",
                data: {
                    quantity: $('.qty_' + i).val(),
                    op: op
                },
                success: function(response) {
                    type = response.type;
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                },
                error: function(request, error) {
                    console.log(arguments);
                    console.log("Error:" + error);
                },
                complete: function() {
                    hideLoadingSpinner();
                    $('.cart-calc').hide();
                }
            });
        }
        $(document).ready(function() {
            /*$(".remove-from-cart").click(function(e) {
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
            });*/
        });
    </script>
@endpush
