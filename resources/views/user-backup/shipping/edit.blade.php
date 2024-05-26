@extends('user.layout.app')
@section('title','Edit')
@section('content')
    
    <div class="card col-sm-8 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{route('shipping.update',encryptor('encrypt',$shipping->id))}}" method="post" class="row">
                @csrf
                @method('PATCH')
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="" name="shipping_title" value="{{old('shipping_title',$shipping->shipping_title)}}" placeholder="shipping tittle">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="" name="shipping_description" value="{{old('shipping_description',$shipping->shipping_description)}}"  placeholder="shipping description">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div> 
    
@endsection