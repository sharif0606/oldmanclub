@extends('backend.layouts.app')
@section('title','Update FeedBack')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('cus_feedback.update',encryptor('encrypt',$feedback->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
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
                                            <option value="{{$c->id}}" {{ old('customer_id',$feedback->customer_id)==$c->id?"selected":""}}> {{$c->fname}} {{$c->middle_name}} {{$c->last_name}} </option>
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
                                    <label class="text-label">Rate *</label>
                                    <input type="text" name="rate" value="{{ old('rate',$feedback->rate)}}" class="form-control">
                                    @if($errors->has('rate'))
                                        <span class="text-danger"> {{ $errors->first('rate') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Message*</label>
                                    <input type="text" name="message" value="{{ old('message',$feedback->message)}}" class="form-control">
                                    @if($errors->has('message'))
                                        <span class="text-danger"> {{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Status*</label>
                                    <select id="show_hide" class="form-control" name="show_hide">
                                        <option value="1" @if(old('show_hide',$feedback->show_hide)==1) selected @endif>Show</option>
                                        <option value="0" @if(old('show_hide',$feedback->show_hide)==0) selected @endif>Hide</option>
                                    </select>
                                    @if($errors->has('show_hide'))
                                        <span class="text-danger"> {{ $errors->first('show_hide') }}</span>
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