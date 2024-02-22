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
                                alt="" class="bg-dark">
                            <p class="badge"><img src="{{asset('public/images/varified.png')}}" alt=""></p><!-- Add your badge here -->
                            @else
                             <img src="{{ asset('public/images/download.jpg') }}" class="img-fluid rounded-circle"
                                alt="asdfdf" class="">
                            @endif
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h4 class="text-primary">                   {{$client->fname}}
                                        {{$client->last_name}}
                                        </h4>
                                        <p>{{$client->address_line_1}}</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-email">
                                        <h4 class="text-muted">{{$client->email}}</h4>
                                        <p>Email</p>
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
                <p><b>Nationality : </b>{{$client->nationality}}</p>
                <p><b>ID No : </b>{{$client->id_no}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card p-3">
            <div class="card-header">
                <h3 class="">Address Information</h3>
            </div>
            <div class="card-body">
                <p><b>Address One : </b>{{$client->address_line_1}}</p>
                <p><b>Address Two : </b>{{$client->address_line_2}}</p>
                <p><b>Country : </b>{{$client->country}}</p>
                <p><b>City : </b>{{$client->city}}</p>
                <p><b>State : </b>{{$client->state}}</p>
                <p><b>Zip Code : </b>{{$client->zip_code}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="mx-auto">National ID</h3>
            </div>
            <div class="card-body">
                <a href="{{asset('public/uploads/verify_image/'.$client->addres_verify?->id_image)}}" target="_blank">
                    <img src="{{asset('public/uploads/verify_image/'.$client->addres_verify?->id_image)}}" alt="" width="100px">
                </a>
            </div>
        </div>
        <div>
            @if($client_address->isNotEmpty())
                @if($client->is_address_verified!=1)
                <a href="{{route('address_verify',encryptor('encrypt',$client->id))}}" class="btn btn-sm bg-danger text-white">
                Verify Your Address
                </a>
                @else
                    <p>This User is Verified</p>
                @endif
            @else
                <p class="text-danger fw-bold">This User Document is Empty</p>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
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
    </div>
</div>
@endsection