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
            <div class="card-header border-0 pb-0">
                <div class="row g-2">
                    <div class="col-lg-2">
                        <h1 class="h4 card-title mb-lg-0">Company</h1>
                    </div>
                    <div class="col-sm-6 col-lg-3 ms-lg-auto">
                        <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                            <option value="AB">Alphabetical</option>
                            <option value="NG">Newest group</option>
                            <option value="RA">Recently active</option>
                            <option value="SG">Suggested</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                    <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('company.create') }}"> <i class="fa-solid fa-plus pe-1"></i> Create company</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content mb-0 pb-0">
                    <div class="tab-pane fade show active" id="tab-1">
                    <div class="row g-4">
                        @foreach($company as $p)
                        <div class="col-sm-6 col-lg-4">
                        <a href="{{route('company.show',encryptor('encrypt',$p->id))}}" class="">
                        <div class="card">
                            @if($p->company_image)
                            <div class="h-80px rounded-top" style="background-image: url({{asset('public/uploads/company/'.$p->company_image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                            @else
                            <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                            @endif
                            <div class="card-body text-center pt-0">
                                <div class="avatar avatar-lg mt-n5 mb-3">
                                    @if($p->company_logo)
                                    <a href="#"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/uploads/company/'.$p->company_logo) }}" alt=""></a>
                                    @else
                                    <a href="#"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt=""></a>
                                    @endif
                                    @if($p->qrcode)
                                        <i class="bi bi-patch-check-fill text-success small"></i>
                                    @else
                                        <i class="bi bi-file-x-fill text-danger small"></i>
                                    @endif
                                </div>
                                <h5 class="mb-0"> <a href="#">{{ $p->company_name }}</a> </h5>
                                <p class="mb-0"><strong>{{ $p->email }}</strong></p>
                                <p class="mb-0"><strong>{{ $p->contact_no }}</strong></p>
                                <p><strong>{{ $p->phone_number }}</strong></p>
                               
                            </div>
                            <div class="d-flex">
                                <a href="{{route('company.edit',encryptor('encrypt',$p->id))}}" class="btn btn-success-soft text-center w-50"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="btn btn-danger-soft text-center w-50"><i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('company.destroy',encryptor('encrypt',$p->id))}}" method="post">
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



{{-- <div class="row g-4">
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
            <h1 class="h4 card-title">Company List</h1>
            <a class="btn btn-primary-soft" href="{{ route('company.create') }}"> <i class="fa-solid fa-plus pe-1"></i> Create company</a>
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
</div>  --}}
@endsection
