@extends('backend.layouts.app')
@section('title',trans('User Profile'))
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="profile">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                    <div class="profile-photo">
                        <img src="{{asset('public/uploads/client/'.$client->image)}}" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h4 class="text-primary">                   {{$client->first_name_en}}
                                        {{$client->last_name_en}}
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
<ul class="nav nav-tabs">
    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Personal Information</a>
    </li>
</ul>
<div class="row">
    <div class="col-sm-6">
        <p><b>Name : </b>{{$client->first_name_en}} {{$client->middle_name_en}} {{$client->last_name_en}}</p>
        <p><b>Email : </b>{{$client->email}}</p>
        <p><b>Birth Date : </b>{{$client->date_of_birth}}</p>
        <p><b>Contact No : </b>{{$client->contact_en}}</p>
        <p><b>Nationality : </b>{{$client->nationality}}</p>
    </div>
    <div class="col-sm-6">
        <p><b>ID No : </b>{{$client->id_no}}</p>
        <p><b>ID Type : </b>{{$client->id_no_type}}</p>
        <p><b>Address One : </b>{{$client->address_line_1}}</p>
        <p><b>Address Two : </b>{{$client->address_line_2}}</p>
        <p><b>Country : </b>{{$client->country}}</p>
        <p><b>City : </b>{{$client->city}}</p>
        <p><b>State : </b>{{$client->state}}</p>
        <p><b>Zip Code : </b>{{$client->zip_code}}</p>
    </div>
</div>
@endsection