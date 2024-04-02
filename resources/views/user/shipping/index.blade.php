@extends('user.layout.base')
@section('title','Shipping')
@section('content')
<style>
    table{
        /* background-color: white; */
    }
    .anchor{
        float:right;
    }
</style>

<main>
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3">
        <div class="d-flex align-items-center d-lg-none">
          <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
          </button>
        </div>
        @include('user.includes.profile-navbar')
      </div>
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <div class="card">
            <div class="card-header d-sm-flex align-items-center text-center justify-content-sm-between border-0 pb-0">
              <h1 class="h4 card-title">SHIPPING</h1>
              <a class="btn btn-primary-soft" href="{{ route('shipping.create') }}" > <i class="fa-solid fa-plus pe-1"></i> CREATE SHIPPING</a>
            </div>
            <div class="card-body">
              <div class="tab-content mb-0 pb-0">
                <div class="tab-pane fade show active" id="tab-1">
                  <div class="row g-4">
                    @forelse($shipping as $value)
                    <div class="col-sm-6 col-xl-4">
                      <a href="{{route('shipping.show',encryptor('encrypt',$value->id))}}" class="text-warning">
                      <div class="card h-100">
                        <div class="position-relative">
                          @if($value->shippingdetail->image)
                          <img class="img-fluid rounded-top w-100" src="{{ asset('public/uploads/shipping/'.$value->shippingdetail->image) }}" alt="">
                          @else
                          <img class="img-fluid rounded-top" src="{{ asset('public/user/assets/images/events/01.jpg') }}" alt="">
                          @endif
                        </div>
                        <div class="card-body position-relative pt-0">
                          <h6 class="mt-3"> <a href="#">{{__($value->shippingdetail?->shipping_title)}}</a> </h6>
                          {!! $value->shippingdetail?->price !!}
                          <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>{{ $value->created_at->format('d M,Y')}}</p>
                        </div>
                        <div class="d-flex">
                          <a href="{{route('shipping.edit',encryptor('encrypt',$value->id))}}" class="btn btn-success-soft text-center w-50"><i class="fa fa-edit"></i>
                          </a>
                          <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="btn btn-danger-soft text-center w-50">
                                        <i class="fa fa-trash"></i>
                              </a>
                            <form id="form{{$value->id}}" action="{{route('shipping.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                          
                     </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</main>
<!-- Bordered table start -->
{{-- <main>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <h1 class="h4 card-title mb-lg-0">Shipping List</h1>
                </div>
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('shipping.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create shipping</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Shipping Tittle')}}</th>
                                <th scope="col">{{__('Shipping Description')}}</th>
                                <th scope="col">{{__('status')}}</th>
                                <th scope="col">{{__('Reject Note')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($shipping as $value)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{__($value->shippingdetail?->shipping_title)}}</td>
                                <td>{{__($value->shippingdetail?->shipping_description)}}</td>
                                <td>
                                    @if($value->status == 1) {{__('pending') }} @elseif($value->status==2) {{__('approved') }} @else{{__('reject')}} @endif
                                </td>
                                <td>{{$value->reject_note}}</td>
                                <td class="white-space-nowrap">
                                    @if($value->status !== 2)
                                    <a href="{{route('shipping.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('shipp_comment',encryptor('encrypt',$value->id))}}">
                                        comment
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                    <form id="form{{$value->id}}" action="{{route('shipping.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main> --}}

@endsection

