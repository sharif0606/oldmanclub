@extends('backend.layouts.app')
@section('title',trans('User Profile'))
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('address_verify_saved',encryptor('encrypt',$client->id))}}">
                        @csrf
                        @method('Post')
                        <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$client->id)}}">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="is_address_verified">Client Address Verified</label>
                                    <select id="is_address_verified" class="form-control" name="is_address_verified">
                                        <option value="0" @if(old('is_address_verified',$client->is_address_verified,0)==0) selected @endif>No</option>
                                        <option value="1" @if(old('is_address_verified',$client->is_address_verified,0)==1) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <button type="submit" class="btn btn-primary me-1 mb-1 mt-4">Save</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection