@extends('user.layout.base')
@section('title', 'Bank')
@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="d-flex align-items-center d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
            </button>
        </div>
        @include('user.includes.profile-navbar')
    </div>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <div class="card">
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">BANK</h4>
                <a class="btn btn-primary-soft" href="{{ route('bank.index') }}"> <i
                        class="fas fa-list pe-1"></i>ALL BANK</a>
            </div>
             <div class="card-body">
                <div class="tab-content mb-0 pb-0">
                    <div class="tab-pane fade show active" id="tab-1">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="card shadow-lg h-100">
                                    <div class="card-header">
                                        <h3 class="mx-auto">Bank Information</h3>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Image</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2"><img src="{{asset('public/uploads/bank/'.$bank->bank_image)}}" alt="" width="50px">
                                            </span>
                                            {{-- <span class="mx-2">{{$bank->bank_name}}</span> --}}
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Bank Name</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->bank_name}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Bank Logo</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2"><img src="{{asset('public/uploads/bank/'.$bank->bank_logo)}}" alt="" width="30px">
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Bank Number</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->contact_no}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">E-mail</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->email}}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow-lg h-100">
                                    <div class="card-header">
                                        <h3 class="mx-auto">Address Information</h3>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Bank Address</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->address}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">City</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->city}}
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">State</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->state}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h4 class="mx-3">Zip Code</h4>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$bank->zip_code}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="mx-auto">Bank Information</h3>
            </div>
            <hr>
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Bank Name</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->bank_name}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Bank Logo</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2"><img src="{{asset('public/uploads/bank/'.$bank->bank_logo)}}" alt="" width="30px">
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Bank Number</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->contact_no}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">E-mail</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->email}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Phone Number</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->phone_number}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="mx-auto">Address Information</h3>
            </div>
            <hr>
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Bank Address</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->address}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">City</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->city}}
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">State</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->state}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Zip Code</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$bank->zip_code}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
           <div class="d-flex">
                <div class="col-sm-6">
                    <h4 class="mx-3 p-5">Description</h4>
                </div>
                <b class="py-5">:</b>
                <span class="mx-2 py-2">{{$bank->description}}</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1 class="mx-auto">Gallery</h1>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                        @if($company->company_document)
                            @foreach(explode(',', $company->company_document) as $document)
                            <div class="col-sm-3">
                                <p><img src="{{ asset('public/uploads/company/' . $document) }}" alt="" width="100%"></p>
                            </div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection


