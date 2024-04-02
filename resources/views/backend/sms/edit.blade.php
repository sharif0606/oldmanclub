@extends('backend.layouts.app')
@section('title',trans('Edit SMS Package'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('sms.update',encryptor('encrypt',$sms->id))}}">
                                            @csrf
                                            @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Package Type  <i class="text-danger">*</i></label>
                                    <select name="package_type" id="package_type" class="form-control">
                                        <option value="">Select Package</option>
                                        <option value="1" @if($sms->package_type==1) selected @endif>Regular</option>
                                        <option value="2" @if($sms->package_type==2) selected @endif>Validity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group"  id="validity_days_field" style="display: none;">
                                    <label for="validity">Number of Days</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('validity_days',$sms->validity_days)}}" name="validity_days">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Title  <i class="text-danger">*</i></label>
                                    <input type="text" id="title" class="form-control" value="{{ old('title',$sms->title)}}" name="title">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Number Of SMS <i class="text-danger">*</i></label>
                                        <input type="text" id="number_of_sms" class="form-control" value="{{ old('number_of_sms',$sms->number_of_sms)}}" name="number_of_sms">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price <i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price',$sms->price)}}" name="price">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Discount<i class="text-danger">*</i></label>
                                    <input type="text" id="discount_percentage" class="form-control" value="{{ old('discount_percentage',$sms->discount_percentage)}}" name="discount_percentage" oninput="calculateDiscountPrice()">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Discount Price <i class="text-danger">*</i></label>
                                    <input type="text" id="discount_price" class="form-control" value="{{ old('discount_price',$sms->discount_price)}}" name="discount_price" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Per sms Charge <i class="text-danger">*</i></label>
                                        <input type="text" id="per_sms_charge" class="form-control" name="per_sms_charge" value="{{old('per_sms_charge',$sms->per_sms_charge)}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Status <i class="text-danger">*</i></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if($sms->status==1) selected @endif>Active</option>
                                        <option value="0" @if($sms->status==0) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="image">image<i class="text-danger">*</i></label>
                                    <input type="file" id="image" class="form-control" value="{{ old('image')}}" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const packageTypeSelect = document.getElementById('package_type');
        const validityDaysField = document.getElementById('validity_days_field');

        packageTypeSelect.addEventListener('change', function() {
            if (packageTypeSelect.value === '2') {
                validityDaysField.style.display = 'block';
            } else {
                validityDaysField.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const numberInput = document.getElementById('number_of_sms');
        const priceInput = document.getElementById('price');
        const perSmsChargeInput = document.getElementById('per_sms_charge');
        // Function to calculate per SMS charge
        function calculatePerSmsCharge() {
            const number = parseFloat(numberInput.value);
            const price = parseFloat(priceInput.value);
            // Check if both number of SMS and price are valid numbers
            if (!isNaN(number) && !isNaN(price) && number !== 0) {
                const perSmsCharge = price / number;
                perSmsChargeInput.value = perSmsCharge.toFixed(2); // Round to 2 decimal places
            } else {
                perSmsChargeInput.value = ''; // Clear the value if invalid input
            }
        }
        // Calculate per SMS charge when the number of SMS or price changes
        numberInput.addEventListener('input', calculatePerSmsCharge);
        priceInput.addEventListener('input', calculatePerSmsCharge);
    });
</script>
<script>
    function calculateDiscountPrice(){
        var price = parseFloat(document.getElementById('price').value);
        var discount = parseFloat(document.getElementById('discount').value);
        if(!isNaN(price) && !isNaN(discount)){
            var discountAmount = (price * discount)/100;
            var discountPrice = price - discountAmount;
            document.getElementById('discount_price').value = discountPrice.toFixed(2);
        }else{
            document.getElementById('discount_price').value = '';
        }
    }
</script>
@endsection
