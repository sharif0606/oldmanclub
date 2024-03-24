@extends('user.layout.base')
@section('title', 'Company')
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
            <div class="card-header d-sm-flex align-items-center text-center justify-content-sm-between border-0 pb-0">
              <h1 class="h4 card-title">Company List</h1>
              <!-- Button modal -->
              <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="fa-solid fa-plus pe-1"></i> Create company</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('QR_code')}}</th>
                                <th scope="col">{{__('Company Name')}}</th>
                                <th scope="col">{{__('Company Logo')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Phone Number')}}</th>
                                <th scope="col">{{__('Address')}}</th>
                                <th scope="col">{{__('City')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($company as $value)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$value->qrcode}}</td>
                                <td>{{$value->company_name}}</td>
                                <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="" width="50px">
                                </td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone_number}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->city}}</td>
                                <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                    {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                                </td>
                                <td class="white-space-nowrap">
                                    @if($value->status==1)
                                        <a href="{{route('company.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    @else
                                        <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
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
            <!-- Tab content END -->
          </div>
          <!-- Card body END -->
        </div>
        <!-- Card END -->
      </div>

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>

{{-- <main>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8 col-lg-6 vstack gap-4">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <h1 class="h4 card-title mb-lg-0">Company List</h1>
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
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('company.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create Company</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('QR_code')}}</th>
                                <th scope="col">{{__('Company Name')}}</th>
                                <th scope="col">{{__('Company Logo')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Phone Number')}}</th>
                                <th scope="col">{{__('Address')}}</th>
                                <th scope="col">{{__('City')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($company as $value)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$value->qrcode}}</td>
                                <td>{{$value->company_name}}</td>
                                <td><img src="{{asset('public/uploads/company/'.$value->company_logo)}}" alt="" width="50px">
                                </td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone_number}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->city}}</td>
                                <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                    {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                                </td>
                                <td class="white-space-nowrap">
                                    @if($value->status==1)
                                        <a href="{{route('company.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="form{{$value->id}}" action="{{route('company.destroy',encryptor('encrypt',$value->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    @else
                                        <a href="{{route('company.show',encryptor('encrypt',$value->id))}}" class="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
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
</main> --}}

@endsection
