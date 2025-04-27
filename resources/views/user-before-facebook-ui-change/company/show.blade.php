@extends('user.layout.base')
@section('title', 'Company')
@section('content')
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
                    <h1 class="h4 card-title mb-lg-0">COMPANY</h1>
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
                    <a class="btn btn-primary-soft" href="{{ route('company.index') }}"> 
                    <i class="fas fa-list pe-1"></i>ALL COMPANY</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="tab-content mb-0 pb-0">
                    <div class="tab-pane fade show active" id="tab-1">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="card shadow-lg h-100">
                                    <div class="card-header">
                                        <h4 class="mx-auto">Company Information</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Image</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2"><img src="{{asset('public/uploads/company/'.$company->company_image)}}" alt="" width="50px">
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Name</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->company_name}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Logo</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2"><img src="{{asset('public/uploads/company/'.$company->company_logo)}}" alt="" width="30px">
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Contact No</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->contact_no}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">E-mail</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->email}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Phone Number</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->phone_number}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow-lg h-100">
                                    <div class="card-header">
                                        <h4 class="mx-auto">Address Information</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Company Address</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->address}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">City</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->city}}
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">State</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->state}}</span>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-sm-6">
                                                <h5 class="mx-3">Zip Code</h5>
                                            </div>
                                            <b>:</b>
                                            <span class="mx-2">{{$company->zip_code}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card shadow-lg">
                                    <div class="d-flex">
                                        <div class="col-sm-6">
                                            <h5 class="mx-3 p-5">Description</h5>
                                        </div>
                                        <b class="py-5">:</b>
                                        <span class="mx-2 py-2">{{$company->description}}</span>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-12">
                                <div class="card shadow-lg">
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
                <h3 class="mx-auto">Company Information</h3>
            </div>
            <hr>
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Company Image</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2"><img src="{{asset('public/uploads/company/'.$company->company_image)}}" alt="" width="50px">
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Company Name</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->company_name}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Company Logo</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2"><img src="{{asset('public/uploads/company/'.$company->company_logo)}}" alt="" width="30px">
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Contact Number</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->contact_no}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">E-mail</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->email}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Phone Number</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->phone_number}}</span>
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
                        <h4 class="mx-3">Company Address</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->address}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">City</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->city}}
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">State</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->state}}</span>
                </div>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <h4 class="mx-3">Zip Code</h4>
                    </div>
                    <b>:</b>
                    <span class="mx-2">{{$company->zip_code}}</span>
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
                <span class="mx-2 py-2">{{$company->description}}</span>
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
