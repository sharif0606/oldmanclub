@extends('frontend.layouts.app')
@section('title', 'Old Club Man')
@section('body-attr')style="background-color: #ebebf2;"@endsection
@section('content')
    <style>
        .card a {
            text-decoration: none;
            color: #000;
        }
        .place_btn {
            background-color: #66298B;
        }

        .place_btn:hover {
            background-color: #3fc6db;
        }

        .del {
            background-color: #DAD9D9;
        }
    </style>
    <div class="container my-5">
        <div class="row">
            <h1 class="text-center fw-bold">Checkout</h1>
            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(session('cart'))
                       {{-- Dump cart session data --}}
{{-- @dump(session('cart')) --}}

                            @foreach(session('cart') as $id=>$details)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>
                                    @if(isset($details['printing_service_id']))
                                        @php
                                            $printingService = \App\Models\Backend\PrintingService::find($details['printing_service_id']);
                                        @endphp
                                        @if($printingService)
                                            @foreach($printingService->printimages as $image)
                                                <img src="{{ asset('public/uploads/printimages/' . $image->image) }}" alt="" width="150px">
                                            @endforeach
                                        @endif
                                    @endif
                                    <p class="m-0 fw-bold">
                                        {{ $details['service_name'] }}
                                    </p>
                                    {!! \Illuminate\Support\Str::limit($details['service_details'], 50, '...') !!}
                                    {{-- {{ $details['service_name'] }}
                                    @if(isset($details['service_details']))
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
            <div class="col-sm-4">
                <div class="card shadow">
                    <h5 class="text-center">Order Summary</h5>
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
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <div class="card p-3 mb-3 shadow">
                    <div class="row">
                        <h3 class="text-center">Please Fill Up the Fileds to Place Order</h3>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Select Type <i class="text-danger">*</i></label>
                                <select class="form-control" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="1" selected>Home</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Address<i class="text-danger">*</i></label>
                                <textarea class="form-control" name="address" rows="5" required></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method"
                                    value="1" checked>
                                <label class="form-check-label" for="payment_method">
                                    Cash On Delivery
                                </label>
                            </div>
                            <button type="submit" class="btn w-25 place_btn text-white float-end rounded-pill px-3 py-2">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    function togglePromoCodeInput() {
        var promoCodeInput = document.getElementById("promoCodeInput");
        if (promoCodeInput.style.display === "none") {
            promoCodeInput.style.display = "block";
        } else {
            promoCodeInput.style.display = "none";
        }
    }
</script>
@endsection
