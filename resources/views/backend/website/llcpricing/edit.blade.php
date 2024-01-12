@extends('backend.layouts.app')
@section('title','Update LLC Pricing Card')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form action="{{route('llcpricing.update',encryptor('encrypt',$llcpricing->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="llcpricing_plan" value="{{ old('llcpricing_plan',$llcpricing->llcpricing_plan)}}" class="form-control">
                                    @if($errors->has('llcpricing_plan'))
                                        <span class="text-danger"> {{ $errors->first('llcpricing_plan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="llcprice" value="{{ old('llcprice',$llcpricing->llcprice)}}" class="form-control">
                                    @if($errors->has('llcprice'))
                                        <span class="text-danger"> {{ $errors->first('llcprice') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Pricing Package <span class="text-danger">*</span></label>
                                    <input type="text" name="llcpricing_package" value="{{ old('llcpricing_package',$llcpricing->llcpricing_package)}}" class="form-control">
                                    @if($errors->has('llcpricing_package'))
                                        <span class="text-danger"> {{ $errors->first('llcpricing_package') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Feature List <span class="text-danger">*</span></label>
                                    <input type="text" name="llcpricingfeature_list" value="{{ old('llcpricingfeature_list',implode(',', $llcpricing->llcpricingfeature_list))}}" class="form-control">
                                    @if($errors->has('llcpricingfeature_list'))
                                        <span class="text-danger"> {{ $errors->first('llcpricingfeature_list') }}</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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