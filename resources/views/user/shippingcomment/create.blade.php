@extends('user.layout.app')
@section('title','create')
@section('content')
    
    <div class="card col-sm-8 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{route('shipcomment.store')}}" method="post" class="row">
                @csrf
                    <div class="col-12">
                        <label for="shipping">Shipping Name</label>
                        <select name="shipping_id" id="shipping" class="form-control mb-3">
                            <option value="">Select Shipping</option>
                            @foreach($shipping as $shipp)
                            <option value="{{$shipp->id}}">{{$shipp->shipping_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="col-12">
                        <label for="">Client Message</label>
                        <input type="text" class="form-control mb-3" id="" name="client_message">
                    </div> -->
                    <div class="col-12">
                        <label for="">Client Message</label>
                        <input type="text" class="form-control mb-3" id="" name="client_message">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
            </form>
        </div>
    </div> 
    
@endsection