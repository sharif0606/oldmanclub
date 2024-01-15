@extends('backend.layouts.app')
@section('title','Add New FeedBack')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('printcus_feedback.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">User Name*</label>
                                    <select name="customer_id" id="" class="form-control">
                                        <option value="">Select user</option>
                                        @forelse($client as $c)
                                            <option value="{{$c->id}}" {{ old('customer_id')==$c->id?"selected":""}}> {{$c->first_name_en}} {{$c->middle_name_en}} {{$c->last_name_en}} </option>
                                        @empty
                                            <option value="">No User found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('roleId'))
                                        <span class="text-danger"> {{ $errors->first('roleId') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Message*</label>
                                    <input type="text" name="customer_message" value="{{ old('customer_message')}}" class="form-control">
                                    @if($errors->has('customer_message'))
                                        <span class="text-danger"> {{ $errors->first('customer_message') }}</span>
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