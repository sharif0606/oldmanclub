@extends('frontend.layouts.app')
@section('title', 'Old Club Man')
@section('body-attr', 'style="background-color: #ebebf2;"')
@section('content')
    <style>
        .checkout {
            background-color: #66298B;
        }

        .checkout:hover {
            background-color: #3fc6db ;
        }
        .bg{
            background-color: #2F0549;
        }
        .blurry-image {
            filter: blur(5px);
        }
    </style>
    <div class="container my-5">
        @if (session('cart'))
        <div class="row">
            <h2 class="text-center fw-bold">Shopping Cart</h2>
            <p class="text-end fw-bold">({{ count(session('cart', [])) }})Items</p>
             <div class="table-responsive mt-0">
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
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col" class="text-center">SL</th>
                        <th scope="col" width="600px">Product</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(session('cart'))
                        @foreach(session('cart') as $id=>$details)
                        <tr>
                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                            <td>
                                @if(isset($details['printing_service_id']))
                                    @php
                                        $printingService = \App\Models\Backend\PrintingService::find($details['printing_service_id']);
                                    @endphp
                                    @if($printingService)
                                        <div class="d-flex">
                                            @foreach($printingService->images as $image)
                                                <div class="mr-2">
                                                    <p class="d-flex">
                                                        @if($image->is_featured)
                                                            <!-- Display the featured image without blur -->
                                                            <img src="{{ asset('public/uploads/printimages/' . $image->image) }}" alt="" width="300px" class="featured-image" data-item-id="{{ $printingService->id }}">
                                                        @else
                                                            <!-- Display the non-featured images with blur -->
                                                            <img src="{{ asset('public/uploads/printimages/' . $image->image) }}" alt="" width="50px" class="blurry-image" data-item-id="{{ $printingService->id }}">
                                                        @endif
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                                    {{-- @if(isset($details['printing_service_id']))
                                        @php
                                            $printingService = \App\Models\Backend\PrintingService::find($details['printing_service_id']);
                                        @endphp
                                        @if($printingService)
                                            @foreach($printingService->images as $image)
                                                <img src="{{ asset('public/uploads/printimages/' . $image->image) }}" alt="" width="300px">
                                            @endforeach
                                        @endif
                                    @endif --}}
                              
                                <p class="m-0 fw-bold">
                                    {{ $details['service_name'] }}
                                </p>
                                <p class="m-0">{!! $details['service_details'] !!}</p>
                                {{-- {!! \Illuminate\Support\Str::limit($details['service_details'], 50, '...') !!} --}}
                                {{-- @if(isset($details['service_details']))
                                    {!! implode(' ', array_slice(explode(' ', $details['service_details']), 0, 5)) !!}
                                @endif --}}
                            </td>
                            <td>
                                ${{$details['price']}}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('addto_cart', $id) }}">
                                        <input type="hidden" name="type" value="1">
                                        <input name="quantity" type="hidden" value="1">
                                        <input type="submit" name="op" value="+"
                                            style="padding:2px 8px;"
                                            class="text-dark">
                                            {{ $details['quantity'] }}
                                        <input type="submit" name="op" value="-"
                                            style="padding:2px 8px;"
                                            class="text-dark">
                                    </form>

                                    <form method="POST"
                                        action="{{ route('remove.from.cart') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id"
                                            value="{{ $id }}">
                                        <button type="submit" style="padding:2px 8px;"
                                            class="mx-2"><i class="bi bi-x"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>${{$details['quantity']*$details['price']}}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
       
        <div class="row mt-2">
            <div class="col-sm-6">
                <h5>Promo Code</h5>
                <div class="d-flex">
                    <input type="text" name="" id="" placeholder="Coupon Code" class="form-control m-0">
                    <button class="btn checkout mx-1 py-0 rounded-pill w-25 text-white">Apply</button>
                </div>
            </div>
            <div class="col-sm-6">
                <h5>Cart Totals</h5>
                <div class="card shadow">
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Subtotal</th>
                            <td>{{'$'.number_format((float) session('cart_details')['cart_total'],2)}}</td>
                        </tr>
                        <tr>
                            <th>Coupon Discount ({{ session('cart_details')['discount'] ?? 0.0 }}%)</th>
                            <td>{{ '$' . number_format((float) isset(session('cart_details')['discount_amount']) ? session('cart_details')['discount_amount'] : 0.0, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{ '$' . number_format((float) session('cart_details')['total_amount'], 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="">
                    <form action="" method="post">
                        @csrf
                        <a href="{{ route('checkout') }}"
                            class="btn btn-sm checkout mt-2 mb-lg-3 py-1 text-white rounded-pill w-25">Checkout</a>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="container text-center mb-5">
            <div class="col-sm-12">
                <img src="{{ asset('public/frontend/assets/image/shopping_cart.jpeg') }}" alt="" width="400px">
                <h1 class="">You have no items in your shopping cart.</h1>
                <a href="{{ route('printservice') }}" class="btn btn-warning text-uppercase fw-bold px-5 mb-5">Continue Shopping</a>
            </div>
        </div>
        @endif
    </div>
    <!-- Cart Section Starts Here -->
    
    <!-- Cart Section Ends Here -->
@endsection

@push('scripts')
    <script>
        // Add click event listener to all images with class 'blurry-image' and 'featured-image'
        document.querySelectorAll('.blurry-image, .featured-image').forEach(function(img) {
            img.addEventListener('click', function() {
                // Get the item ID associated with this image
                const itemId = this.getAttribute('data-item-id');
                // Remove blur effect from all images associated with this item
                document.querySelectorAll('[data-item-id="' + itemId + '"]').forEach(function(itemImg) {
                    itemImg.classList.add('blurry-image');
                    itemImg.style.width = '50px';
                });
                // Remove blur effect from the clicked image
                this.classList.remove('blurry-image');
                this.style.width = '300px';
            });
        });
    </script>
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
