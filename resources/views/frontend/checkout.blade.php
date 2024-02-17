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
            background-color: #F85606;
        }

        .place_btn:hover {
            background-color: #2F0549;
        }

        .del {
            background-color: #DAD9D9;
        }
    </style>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-8">
                @if (session('cart'))
                    @forelse (session('cart') as $id => $details)
                        <div class="card mb-3 p-3">
                            <div class="d-flex">
                                <div class="col-sm-2">
                                    @if (isset($details['image']) && !empty($details['image']))
                                        <img src="{{ asset('public/uploads/printimages/' . $details['image']) }}"
                                            alt="" width="150px">
                                    @endif

                                </div>
                                <div class="col-sm-3">
                                    <a href="#">{{ $details['service_name'] }}</a>
                                    <p>{{ $details['service_name'] }}</p>
                                </div>
                                <div class="col-sm-2 d-flex">
                                    <span>Quantity: {{ $details['quantity'] }}</span>
                                </div>
                                <div class="col-sm-2">
                                    <div class="d-flex">
                                        <form action="{{ route('addto_cart', $id) }}">
                                            <input type="hidden" name="type" value="1">
                                            <input name="quantity" type="hidden" value="1">
                                            <input type="submit" name="op" value="+" style="padding:2px 8px;"
                                                class="btn btn-sm btn-primary">
                                            <input type="submit" name="op" value="-"
                                                style="padding:2px 8px;margin-left:4px;" class="btn btn-warning btn-sm">

                                        </form>

                                        <form method="POST" action="{{ route('remove.from.cart') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" style="padding:2px 8px;"
                                                class="mx-1 btn btn-danger btn-sm"><i class="fas fa-trash-alt"
                                                    style="padding-top:0;font-size:12px;margin-bottom:0px"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-3 d-flex">
                                    {{-- <del class="me-3">$500</del>
                                    <del>-50%</del> --}}
                                    <p class="ms-auto">${{ $details['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                @endif
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf
                    <div class="row">
                        <h5>Please Fill Up the Fileds to Place Order</h5>
                        <div class=col-12">
                            <div class="form-group">
                                <label for="name">Select Type <i class="text-danger">*</i></label>
                                <select class="form-control" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="1" selected>Home</option>
                                </select>
                            </div>
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
                        </div>
                    </div>
                    <button type="submit" class="btn w-25 place_btn text-white">Place Order</button>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    {{-- <p class="text-center">discount and Payment</p>
                    <div class="d-flex">
                        <span>
                            <img src="{{ asset('public/frontend/assets/image/promo.png') }}" alt="">
                        </span>
                        <p class="p-2">Promo Code</p>
                        <a href="#" class="ms-auto p-2" onclick="togglePromoCodeInput()">
                            <span>Enter promo code </span>
                        </a>
                        <i class="fa-solid fa-angle-right pt-2"></i>
                    </div>
                    <div class="input-group" id="promoCodeInput" style="display: none;">
                        <input type="text" name="promo_code" id="promo_code" placeholder="Enter promo code"
                            class="w-75" />
                        <button type="submit" class="sm-button bg-info">Confirm</button>
                    </div>
                    <hr> --}}
                    <div>
                        <p class="text-center">Order Summary</p>
                    </div>
                    <div class="d-flex">
                        <p class="fs-6 fw-bold m-0">Total Items</p>
                        <span class="ms-auto">{{ count(session('cart', [])) }}</span>
                    </div>
                    <hr>
                    {{-- <div class="d-flex">
                        <p class="fs-6 fw-bold m-0">Delivery Fee</p>
                        <span class="ms-auto">$100</span>
                    </div>
                    <hr> --}}
                    <div class="d-flex">
                        <p class="fs-6 fw-bold m-0">Total Payment</p>
                        <span
                            class="ms-auto">{{ '$' . number_format((float) session('cart_details')['total_amount'], 2) }}</span><br>
                    </div>
                    <hr>
                    {{-- <p class="fs-6 ms-auto">Vat included, Where Applicable</p> --}}
                    {{-- <div>
                        <button type="submit" class="btn w-100 place_btn text-white">Place Order</button>
                    </div> --}}
                </div>
            </div>
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
