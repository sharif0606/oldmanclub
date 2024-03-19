@extends('user.layout.base')
@section('title','Order List')
@section('content')
<div class="card col-sm-8 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{route('order_update',$order->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="col-12">
                     <div class="form-group">
                        <label for="">Upload Image</label>
                        <input type="file" name="sample_image" id="" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
