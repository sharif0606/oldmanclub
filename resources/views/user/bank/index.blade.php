@extends('user.layout.base')
@section('title', 'Bank')
@section('content')
<style>
    table{
        background-color: white;
    }
    .pull-right{
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
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                  <!-- Card title -->
                  <h1 class="h4 card-title mb-lg-0">Bank List</h1>
                </div>
                {{--  <div class="col-sm-6 col-lg-3 ms-lg-auto">
                  <!-- Select Groups -->
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div>  --}}
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <!-- Button modal -->
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('bank.create') }}"> <i class="fa-solid fa-plus pe-1"></i> Create bank</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped  mb-0" id="bank">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Bank Name')}}</th>
                                <th scope="col">{{__('Branch Name')}}</th>
                                <th scope="col">{{__('Branch Logo')}}</th>
                                <th scope="col">{{__('RTN Code')}}</th>
                                <th scope="col">{{__('SWIFT Code')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                {{--  <th scope="col">{{__('Address')}}</th>
                                <th scope="col">{{__('City')}}</th>
                                <th scope="col">{{__('State')}}</th>
                                <th scope="col">{{__('Zip Code')}}</th>  --}}
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $value)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$value->bank_name}}</td>
                                <td>{{$value->branch_name}}</td>
                                <td><img src="{{asset('public/uploads/bank/'.$value->bank_logo)}}" alt="" width="50px">
                                </td>
                                <td>{{$value->rtn_number}}</td>
                                <td>{{$value->swift_code}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->contact_no}}</td>
                                {{--  <td>{{$value->address}}</td>
                                <td>{{$value->city}}</td>
                                <td>{{$value->state}}</td>
                                <td>{{$value->zip_code}}</td>  --}}
                                <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                    {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                                </td>
                                <td class="white-space-nowrap">

                                    <a href="{{route('bank.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('bank.show',encryptor('encrypt',$value->id))}}" class="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$value->id}}" action="{{route('bank.destroy',encryptor('encrypt',$value->id))}}" method="post">
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
      </div>
    </div>
  </div>
</main>
{{--  <div class="row">
    <div class="col-10 mx-auto">
        <div class="card py-4 px-2">

            <div class="table-responsive">
                <span class="fs-4">Bank List</span>
                <a class="btn btn-primary-soft ms-auto" href="{{route('bank.create')}}" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> <i class="fa-solid fa-plus pe-1"></i> Create bank</a>
                <a class="pull-right px-2 fs-4" href="{{route('bank.create')}}"><i class="fa fa-plus">create Bank</i></a>
            </div>
            <!-- table bordered -->
            <div class="table-responsive">
                <table class="table table-striped  mb-0" id="bank">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Bank Name')}}</th>
                            <th scope="col">{{__('Branch Name')}}</th>
                            <th scope="col">{{__('Branch Logo')}}</th>
                            <th scope="col">{{__('RTN Code')}}</th>
                            <th scope="col">{{__('SWIFT Code')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Contact No')}}</th>
                            <th scope="col">{{__('Address')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('State')}}</th>
                            <th scope="col">{{__('Zip Code')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $value)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$value->bank_name}}</td>
                            <td>{{$value->branch_name}}</td>
                            <td><img src="{{asset('public/uploads/bank/'.$value->bank_logo)}}" alt="" width="50px">
                            </td>
                            <td>{{$value->rtn_number}}</td>
                            <td>{{$value->swift_code}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->contact_no}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->city}}</td>
                            <td>{{$value->state}}</td>
                            <td>{{$value->zip_code}}</td>
                            <td style="color: @if($value->status==1) #FFC107 @elseif($value->status==2) #15CE73 @elseif($value->status==3) red @endif; font-weight:bold;">
                                {{ $value->status == 1 ? __('Pending') : ($value->status == 2 ? __('Accepted') : __('Rejected')) }}
                            </td>
                            <td class="white-space-nowrap">

                                <a href="{{route('bank.edit',encryptor('encrypt',$value->id))}}" class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('bank.show',encryptor('encrypt',$value->id))}}" class="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$value->id}}').submit()" class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$value->id}}" action="{{route('bank.destroy',encryptor('encrypt',$value->id))}}" method="post">
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
</div>  --}}
@endsection
