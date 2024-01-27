@extends('user.layout.app')
@section('title','create')
@section('content')
    
    <div class="card col-sm-8 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{route('shipping.store')}}" method="post" class="row">
                @csrf
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="" name="shipping_title" placeholder="shipping tittle">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="" name="shipping_description" placeholder="shipping description">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div> 
    
@endsection