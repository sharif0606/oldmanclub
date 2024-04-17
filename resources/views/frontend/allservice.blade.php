@extends('frontend.layouts.app')
@section('title','Old Club Man')
@section('content')
<div class="container">
    <div class="row my-5 py-3">
        @forelse($services as $value)
        <div class="col-sm-4">
            <a href="{{$value->link}}" class="card-link service">
                <div class="card fixed-size-card my-2">
                    <img src="{{asset('public/uploads/ourservices/'.$value->image)}}" class="card-img-top" alt="Product Shipping Service">
                    {{-- <hr> --}}
                    <div class="card-body">
                        <p class="card-text text-decoration-none">
                            {{$value->title}}    
                        </p>
                    </div>
                </div>
            </a>                               
        </div>
        @empty
        <h1>No Service Found</h1>
        @endforelse
    </div>
</div>
@endsection