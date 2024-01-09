@extends('backend.layouts.app')
@section('title','Add NFC Card')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          
        </div>
        <div class="card-body">
            <form action="{{route('nfccardprice.update',encryptor('encrypt',$nfccardprice->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">NFC Card Name <small class="text-danger">*</small></label>
                                    <input type="text" name="nfc_card_name" value="{{ old('nfc_card_name',$nfccardprice->nfc_card_name)}}" class="form-control">
                                    @if($errors->has('nfc_card_name'))
                                        <span class="text-danger"> {{ $errors->first('nfc_card_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Card Price<small class="text-danger">*</small></label>
                                    <input type="text" name="card_price" value="{{ old('card_price',$nfccardprice->card_price)}}" class="form-control">
                                    @if($errors->has('card_price'))
                                        <span class="text-danger"> {{ $errors->first('card_price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Card Title<small class="text-danger">*</small></label>
                                    <input type="text" name="card_title" value="{{ old('card_title',$nfccardprice->card_title)}}" class="form-control">
                                    @if($errors->has('card_title'))
                                        <span class="text-danger"> {{ $errors->first('card_title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Feature List<small class="text-danger">*</small></label>
                                    <input type="text" name="card_feature_list" value="{{ old('card_feature_list', implode(',',$nfccardprice->card_feature_list))}}" class="form-control">
                                    @if($errors->has('card_feature_list'))
                                        <span class="text-danger"> {{ $errors->first('card_feature_list') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Payment Type<small class="text-danger">*</small></label>
                                    <input type="text" name="payment_type" value="{{ old('payment_type',$nfccardprice->payment_type)}}" class="form-control">
                                    @if($errors->has('payment_type'))
                                        <span class="text-danger"> {{ $errors->first('payment_type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary me-1" style="margin-top:33px">Save</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection