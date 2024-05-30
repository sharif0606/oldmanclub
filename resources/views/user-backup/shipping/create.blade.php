@extends('user.layout.app')
@section('title', 'create')
@section('content')

    <div class="card col-sm-10 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{ route('shipping.store') }}" method="post" class="row">
                @csrf
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="" name="shipping_title"
                        placeholder="Product Title">
                </div>
                <div class="col-12">
                    <textarea name="shipping_description" class="form-control mb-3" placeholder="Order Details" rows="5"></textarea>
                </div>
                <div class="col-12">
                    <textarea name="delivery_address" class="form-control mb-3" placeholder="Delivery Address" rows="5"></textarea>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="" name="price" placeholder="Price">
                </div>
                <div class="col-12">
                    <label>Select Shipping Method</label>
                    <select name="shipping_method" class="form-control mb-3">
                        <option value="">Select</option>
                        <option value="1">Option1</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Order Product With Shipping</button>
                </div>
            </form>
        </div>
    </div>

@endsection
