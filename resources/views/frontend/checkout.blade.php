@extends('frontend.layouts.app')
@section('title','Old Club Man')
@section('body-attr')style="background-color: #ebebf2;"@endsection
@section('content')
<style>
    .card a{
        text-decoration:none;
        color:#000;
    }
    .place_btn{
        background-color: #F85606;
    }
    .place_btn:hover {
        background-color: #2F0549;
    }
    .del{
        background-color: #DAD9D9;
    }

</style>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-3">
                <a href="#" class="text-center"><i class="fa fa-plus mx-2"></i>Add new delivery address</a>
            </div>
            <div class="card mb-3 p-3">
                <div class="d-flex">
                    <div class="col-sm-2">
                        <img src="{{asset('public/uploads/printimages/712.png')}}" alt="" width="100px">
                    </div>
                    <div class="col-sm-3">
                        <a href="#">service name </a>
                        <p>Lorem ipsum dolor sit amet .</p>
                    </div>
                    <div class="col-sm-2 d-flex">
                        <span>Quantity: 1</span>
                    </div>
                    <div class="col-sm-2">
                        <a href="#" class=""><i class="far fa-trash-alt remove-from-cart"></i></a>
                    </div>
                    <div class="col-sm-3 d-flex">
                        <del class="me-3">$500</del>
                        <del>-50%</del>
                        <p class="ms-auto">$400</p>
                    </div>
                </div>
            </div>
            <div class="card mb-3 p-3">
                <div class="d-flex">
                    <div class="col-sm-2">
                        <img src="{{asset('public/uploads/printimages/712.png')}}" alt="" width="100px">
                    </div>
                    <div class="col-sm-3">
                        <a href="#">service name </a>
                        <p>Lorem ipsum dolor sit amet .</p>
                    </div>
                    <div class="col-sm-2 d-flex">
                        <span>Quantity: 1</span>
                    </div>
                    <div class="col-sm-2">
                        <a href="#" class=""><i class="far fa-trash-alt remove-from-cart"></i></a>
                       
                    </div>
                    <div class="col-sm-3 d-flex">
                        <del>$500</del>
                        <del>-50%</del>
                        <p class="ms-auto">$400</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card p-3">
                <p class="text-center">discount and payment</p>
                <div class="d-flex">

                    <span>
                        <img src="{{asset('public/frontend/assets/image/promo.png')}}" alt="">
                    </span>
                    <p class="p-2">Promo Code</p>
                    <a href="#" class="ms-auto p-2" onclick="togglePromoCodeInput()">
                        <span>Enter promo code </span>
                    </a>
                    <i class="fa-solid fa-angle-right pt-2"></i>
                </div>
                <div class="input-group" id="promoCodeInput" style="display: none;">
                    <input type="text" name="promo_code" id="promo_code"  placeholder="Enter promo code"  class="w-75"/>
                    <button type="submit" class="sm-button bg-info">Confirm</button>
                </div>
                <hr>
                <div>
                    <p class="text-center">Order Summary</p>
                </div>
                <div class="d-flex">
                    <p class="fs-6 fw-bold m-0">Total Items</p>
                    <span class="ms-auto">$500</span>
                </div>
                <hr>
                <div class="d-flex">
                    <p class="fs-6 fw-bold m-0">Delivery Fee</p>
                    <span class="ms-auto">$100</span>
                </div>
                <hr>
                <div class="d-flex">
                    <p class="fs-6 fw-bold m-0">Total Payment</p>
                    <span class="ms-auto">$600</span><br>
                </div>
                <hr>
                <p class="fs-6 ms-auto">Vat included, Where Applicable</p>
                <div>
                    <a href="#" class="btn w-100 place_btn text-white">Place Order</a>
                </div>
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
