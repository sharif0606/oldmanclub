@extends('backend.layouts.app')
@section('title',trans('User Profile'))
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="profile">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo">
                        @if($client->cover_photo)
                                <img src="{{ asset('public/uploads/client/' . $client->cover_photo) }}" class="cover"
                            alt="">
                        @else
                            <img src="{{ asset('public/images/profile/cover2.jpg') }}" alt="" class="cover">
                        @endif
                    </div>
                    <div class="profile-photo">
                        @if($client->image)
                        <img src="{{ asset('public/uploads/client/' . $client->image) }}" class="img-fluid rounded-circle"
                            alt="" class="bg-dark" width="500px">
                            @if($client->is_address_verified==1) 
                                <p class="badge"><img src="{{asset('public/images/varified.png')}}" alt=""></p><!-- Add your badge here -->
                            @else
                                <p class="badge"><img src="{{asset('public/images/unverified.png')}}" alt=""></p>
                            @endif
                        @else
                            <img src="{{ asset('public/images/download.jpg') }}" class="img-fluid rounded-circle"
                            alt="asdfdf" class="">
                            <p class="badge"><img src="{{asset('public/images/unverified.png')}}" alt=""></p>
                        @endif
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="row flex-nowrap">
                            <div class="col-3 col-sm-3 border-right-1 prf-col">
                                <div class="profile-name">
                                    <h5 class="text-primary"> {{ $client->fname }} {{ $client->middle_name }}
                                        {{ $client->last_name }}</h5>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3 border-right-1 prf-col">
                                <div class="profile-name">
                                    <h5 class="text-primary">Address</h5>
                                    <p>{{ $client->address_line_1 }}&nbsp;
                                        <small style="color: @if($client->is_address_verified==1) #26d66c @else red @endif; font-weight:bold;">
                                            @if($client->is_address_verified==1)
                                                (Verified)
                                            @else
                                                (Not Verified)
                                            @endif
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3 border-right-1 prf-col">
                                <div class="profile-email">
                                    <h5 class="text-primary">Email<small class="text-warning">&nbsp;(Not Verified)</small></h5>
                                    <h5 class="text-muted">{{ $client->email }}</h5>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3 prf-col">
                                <div class="profile-call">
                                    <h5 class="text-primary">Phone No.</h5>
                                    <h5 class="text-muted">(+088) {{ $client->contact_no }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <h2 class="mx-auto"><i>Profile Information</i></h2>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card p-3">
            <div class="card-header">
                <h3 class="">Personal Information</h3>
            </div>
            <div class="card-body">
                <p><b>Name : </b>{{$client->fname}} {{$client->middle_name}} {{$client->last_name}}</p>
                <p><b>Email : </b>{{$client->email}}</p>
                <p><b>Birth Date : </b>{{$client->dob}}</p>
                <p><b>Contact No : </b>{{$client->contact_no}}</p>
                {{-- <p><b>Nationality : </b>{{$client->nationality}}</p>
                <p><b>ID No : </b>{{$client->id_no}}</p> --}}
                <h3 class="">PHOTO ID</h3>
                <a href="{{ asset('public/uploads/verify_image/' . $client->photo_id) }}" target="_blank"> <!-- Open image in new tab when clicked -->
                    <embed width="100px" src="{{ asset('public/uploads/verify_image/' . $client->photo_id) }}"  alt="Document" class="m-1">
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card p-3">
            <div class="card-header">
                <h3 class="">Address Information</h3>
            </div>
            <div class="card-body">
                <p><b>Mailing Address : </b>{{$client->address_line_1}}</p>
                {{-- <p><b>Address Two : </b>{{$client->address_line_2}}</p> --}}
                <p><b>Verification Code : </b>{{$client->code}}</p>
                <p><b>Country : </b>{{$client->country}}</p>
                <p><b>City : </b>{{$client->city}}</p>
                <p><b>State : </b>{{$client->state}}</p>
                <p><b>Zip Code : </b>{{$client->zip_code}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        {{--<div class="card">
            <div class="card-header">
                <h3 class="mx-auto">National ID</h3>
            </div>
            <div class="card-body">
                <a href="{{asset('public/uploads/verify_image/'.$client->addres_verify?->id_image)}}" target="_blank">
                    <img src="{{asset('public/uploads/verify_image/'.$client->addres_verify?->id_image)}}" alt="" width="100px">
                </a>
            </div>
        </div>--}}
        <div>
            @if($client->address_line_1)
                @if($client->verification_request_status==1)
                <a href="{{route('address_verify',encryptor('encrypt',$client->id))}}" class="btn btn-sm bg-danger text-white">
                Generate Address Verification Code
                </a>
                @elseif ($client->verification_request_status==2)
                    <a href="{{route('address_verify',encryptor('encrypt',$client->id))}}" class="btn btn-sm bg-danger text-white">
                        Print Mailing Address
                    </a>
                @elseif ($client->verification_request_status==3){
                    <p>This User Address is Verified</p>
                }
                @else
                    -
                @endif
            @else
                <p class="text-danger fw-bold">Address Verification Not Yet Requested.</p>
            @endif
        </div>
    </div>
    {{--<div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="mx-auto">Gallery</h3>
            </div>
            <div class="card-body">
                @if($client_address->isNotEmpty())
                    @foreach($client_address as $document)
                       @php
                            $filePaths = explode(',', $document->document); // Assuming files are separated by commas
                        @endphp
                        <div class="col-sm-4">
                            @foreach($filePaths as $filePath)
                                <a href="{{ asset('public/uploads/verify_image/' . $filePath) }}" target="_blank"> <!-- Open image in new tab when clicked -->
                                    <embed width="100px" src="{{ asset('public/uploads/verify_image/' . $filePath) }}"  alt="Document" class="m-1">
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>--}} 
</div>
@endsection