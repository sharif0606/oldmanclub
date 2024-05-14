@extends('backend.layouts.app')
@section('title',trans('Coupon'))
@section('page',trans('Update'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('coupon.update', encryptor('encrypt',$coupon->id)) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" value="{{ old('code',$coupon->code) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="percentage" {{ $coupon->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        <option value="fixed_amount" {{ $coupon->type == 'fixed_amount' ? 'selected' : '' }}>Fixed Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="text" name="value" value="{{ old('value',$coupon->value) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" value="{{ old('start_date', substr($coupon->start_date, 0, 10)) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" value="{{ old('end_date', substr($coupon->end_date, 0, 10)) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="max_uses">Maximum Uses</label>
                                    <input type="text" name="max_uses" value="{{ old('max_uses',$coupon->max_uses) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                   <select name="status" class="form-control" required>
                                        <option value="1" {{ $coupon->status == '1' ? 'selected' : '' }}>Show</option>
                                        <option value="0" {{ $coupon->status == '0' ? 'selected' : '' }}>Hide</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
