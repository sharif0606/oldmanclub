@extends('user.layout.base')
@section('title','Order List')
@section('content')

<main>
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">
        <!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
        <div class="d-flex align-items-center d-lg-none">
          <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
          </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
        
        <!-- Navbar START-->
         @include('user.includes.profile-navbar')
        <!-- Navbar END-->
      </div>
      <!-- Sidenav END -->

      <!-- Main content START -->
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <!-- Card START -->
          <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <!-- Card title -->
                  <h1 class="h4 card-title mb-lg-0">Order List</h1>
                </div>
                 <div class="col-sm-6 col-lg-3 ms-lg-auto">
                  <!-- Select Groups -->
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div> 
                  
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Tracking No')}}</th>
                                <th scope="col">{{__('User Name')}}</th>
                                <th scope="col">{{__('Shipping Address')}}</th>
                                <th scope="col">{{__('Tax')}}</th>
                                <th scope="col">{{__('Total')}}</th>
                                <th scope="col">{{__('Discount')}}</th>
                                <th scope="col">{{__('Payable')}}</th>
                                <th scope="col">{{__('Order Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($order as $value)
                                <tr>
                                    <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$value->tracking_no}}</td>
                                    <td>{{$value->client?->fname}}</td>
                                    <td>{{$value->shipping?->address}}</td>

                                    <td>{{$value->tax}}</td>
                                    <td>{{$value->total}}</td>
                                    <td>{{$value->discount}}</td>
                                    <td>{{$value->payable}}</td>
                                    <td>{{$value->order_status == 1 ? __('Processing') :
                                        ($value->order_status == 2 ? __('Printing') :
                                        ($value->order_status == 3 ? __('Complete') :
                                        ($value->order_status == 4 ? __('Delivered') : '')))}}
                                    </td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route('order_edit_sampleimg',$value->id)}}">
                                        <i class="fa fa-upload"></i>
                                        </a>
                                        {{--<a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="form{{$value->id}}" action="{{route('nfc_field.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>--}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="13" class="text-center">No Pruduct Found</th>
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
</main>
{{-- <div class="row">
    <div class="col-10 mx-auto">
        <div class="card p-4">
            <!-- table bordered -->
            <div class="table-responsive">
                <div>
                </div>
                <table class="table table-bordered table-striped mb-0" id="phone_book">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Tracking No')}}</th>
                            <th scope="col">{{__('User Name')}}</th>
                            <th scope="col">{{__('Shipping Address')}}</th>
                            <th scope="col">{{__('Tax')}}</th>
                            <th scope="col">{{__('Total')}}</th>
                            <th scope="col">{{__('Discount')}}</th>
                            <th scope="col">{{__('Payable')}}</th>
                            <th scope="col">{{__('Order Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->tracking_no}}</td>
                            <td>{{$value->client?->fname}}</td>
                            <td>{{$value->shipping?->address}}</td>

                            <td>{{$value->tax}}</td>
                            <td>{{$value->total}}</td>
                            <td>{{$value->discount}}</td>
                            <td>{{$value->payable}}</td>
                            <td>{{$value->order_status == 1 ? __('Processing') :
                                ($value->order_status == 2 ? __('Printing') :
                                ($value->order_status == 3 ? __('Complete') :
                                ($value->order_status == 4 ? __('Delivered') : '')))}}
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{route('order_edit_sampleimg',$value->id)}}">
                                   <i class="fa fa-upload"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('nfc_field.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="13" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
@endsection
