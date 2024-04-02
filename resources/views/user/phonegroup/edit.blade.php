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
                <h4 class="card-title h4">PHONE GROUP EDIT</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('phonegroup.index') }}"> <i
                        class="fas fa-list pe-1"></i>All PHONE GROUP</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        <div class="card col-sm-12 shadow-lg">
                            <div class="card-body">
                                <form action="{{ route('phonegroup.update',encryptor('encrypt',$phonegroup->id)) }}" enctype="multipart/form-data" method="post" class="row">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" id="Phone" name="group_name" value="{{old('group_name',$phonegroup->group_name)}}"  placeholder="Phone Group">
                                    </div>
                                    <div class="col-12">
                                        <input type="file" class="form-control mb-3" id="" name="image" >
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-3">Save</button>
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

{{-- <main>
  <!-- Container START -->
    <div class="container">
        <div class="row g-4">
        <!-- Main content START -->
            <div class="col-lg-8 mx-auto">
                <div class="bg-mode p-4">
                    <div class="compose-content">
                        <form action="{{route('phonegroup.store')}}" method="post" class="row">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" id="Phone" name="group_name" placeholder="Phone Group">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> --}}
@endsection
