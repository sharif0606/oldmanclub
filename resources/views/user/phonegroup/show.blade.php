@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<!-- Bordered table start -->
<style>
    .add{
        float: right;
    }
</style>
<main>
  <!-- Container START -->
<div class="container">
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
                    <h1 class="h4 card-title mb-lg-0">PHONE GROUP</h1>
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
                    <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('phonegroup.index') }}"> <i class="fa-solid fa-plus pe-1"></i>All PHONE GROUP</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mb-0 pb-0">
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="row g-4">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card">
                                        @if($phonegroup->image)
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/uploads/phonegroup/'.$phonegroup->image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @else
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @endif
                                        <div class="card-body text-center pt-0">
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt=""></a>
                                            </div>
                                            <h5 class="mb-0"> <a href="group-details.html">{{ $phonegroup->group_name }}</a> </h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <div>
                                                <h6 class="mb-0">{{ $contactbygroup[$phonegroup->id] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-8">
                                    <div class="card p-2">
                                        <table class="table w-100 text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                            </tr>
                                            @forelse($phonebook as $p)
                                                <tr>
                                                    <td>{{++$loop->index}}</td>
                                                    <td>{{$p->name_en}}</td>
                                                    <td>{{$p->contact_en}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="3" class="text-center">Contact Not  Found</th>
                                                </tr>
                                            @endforelse
                                        </table>
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
</main>
@endsection

