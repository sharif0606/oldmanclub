@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<div class="row g-4">
    <!-- Sidenav START -->
    <div class="col-lg-3">
        <!-- Advanced filter responsive toggler START -->
        <div class="d-flex align-items-center d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
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
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">UPDATE CONTACT</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('phonebook.index') }}"> <i
                        class="fas fa-list pe-1"></i>All CONTACT</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        <div class="card col-sm-12 shadow-lg">
                            <div class="card-body">
                                <form action="{{route('phonebook.update',encryptor('encrypt',$phonebook->id))}}" method="post" class="row" enctype="multipart/form-data">
                                    @csrf
                                    @method('Patch')
                                    <div class="col-12">
                                        <div class="col-12">
                                        <select name="group_id" id="" class="form-control mb-3">
                                                <option value="">Select Group</option>
                                            @foreach($phonegroup as $group)
                                                <option value="{{$group->id}}" {{ old('group_id', $phonebook->group_id)==$group->id?"selected":""}}>{{$group->group_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control mb-3" id="Phone" name="contact_en" value="{{old('contact_en',$phonebook->contact_en)}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control mb-3" id="Name" name="name_en" value="{{old('contact_en',$phonebook->name_en)}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control mb-3" id="Email" name="email" value="{{old('contact_en',$phonebook->email)}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control mb-3" id="description" name="description" value="{{old('description',$phonebook->description)}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control mb-3" id="Email" name="company_name" value="{{old('company_name',$phonebook->company_name)}}">
                                        </div>
                                        <div class="col-12">
                                            <input type="file" class="form-control mb-3" id="Email" name="image">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Photos of you tab END -->
                </div>
                <!-- Album Tab content END -->
            </div>
            <!-- Card body END -->
        </div>
        <!-- Card END -->
    </div>
</div><!-- Row END -->




    {{-- <div class="row">
        <div class="col-sm-6 mx-auto card">
            <div class="card-body">
                <p class="fs-4 text-center">Update Contact</p>
                <form action="{{route('phonebook.update',encryptor('encrypt',$phonebook->id))}}" method="post" class="row">
                    @csrf
                    @method('Patch')
                    <div class="col-12">
                        <div class="col-12">
                           <select name="group_id" id="" class="form-control mb-3">
                                <option value="">Select Group</option>
                            @foreach($phonegroup as $group)
                                <option value="{{$group->id}}" {{ old('group_id', $phonebook->group_id)==$group->id?"selected":""}}>{{$group->group_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="Phone" name="contact_en" value="{{old('contact_en',$phonebook->contact_en)}}">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="Name" name="name_en" value="{{old('contact_en',$phonebook->name_en)}}">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="Email" name="email" value="{{old('contact_en',$phonebook->email)}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
