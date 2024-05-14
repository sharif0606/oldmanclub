@extends('frontend.layouts.app')
@section('title','Old Club Man')
@section('content')
@push('styles')
<style>
    @keyframes slideInFromLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInFromRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animate-slide {
        animation-duration: 0.7s;
        animation-fill-mode: both;
    }

    /* Ensure animations are applied only when viewport width is at least 768px */
    @media (min-width: 768px) {
        /* Slide in from left for even-indexed cards */
        .row.animate-slide .col-sm-4:nth-child(even) {
            animation-name: slideInFromLeft;
        }

        /* Slide in from right for odd-indexed cards */
        .row.animate-slide .col-sm-4:nth-child(odd) {
            animation-name: slideInFromRight;
        }
    }
</style>
@endpush
<div class="container">
    <div class="row my-5 py-3 g-2 animate-slide">
        @forelse($services as $value)
        <div class="col-sm-4 animate-slide">
            <a href="{{$value->link}}" class="card-link service">
                <div class="card fixed-size-card my-2">
                    <img src="{{asset('public/uploads/ourservices/'.$value->image)}}" class="card-img-top" alt="Product Shipping Service">
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
