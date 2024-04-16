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
                  <h1 class="h4 card-title mb-lg-0">PHONE GROUP</h1>
                </div>
                <div class="col-sm-6 col-lg-3 ms-lg-auto">
                  <!-- Select Groups -->
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div>
                  <div class="col-sm-6 col-lg-3">
                  <!-- Button modal -->
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('phonegroup.create') }}"> <i class="fa-solid fa-plus pe-1"></i> CREATE PHONE GROUP</a>
                </div>
              </div>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
              <!-- Tab nav line -->
              {{-- <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start">
                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"> Friends' groups </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-2"> Suggested for you </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3"> Popular near you </a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-4"> More suggestions </a> </li>
              </ul> --}}
              <div class="tab-content mb-0 pb-0">
                <!-- Friends groups tab START -->
                <div class="tab-pane fade show active" id="tab-1">
                  <div class="row g-4">
                    @foreach($phonegroup as $p)
                    <div class="col-sm-6 col-lg-4">
                      <!-- Card START -->
                      <a href="{{route('phonegroup.show',encryptor('encrypt',$p->id))}}" class="">
                      <div class="card">
                        @if($p->image)
                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/uploads/phonegroup/'.$p->image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                        @else
                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                        @endif
                          <!-- Card body START -->
                          <div class="card-body text-center pt-0">
                            <!-- Avatar -->
                              <div class="avatar avatar-lg mt-n5 mb-3">
                                <img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt="">
                              </div>
                             
                              <h5 class="mb-0"> {{ $p->group_name }} </h5>
                              <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                             
                              <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                
                                <div>
                                  <h6 class="mb-0">{{ $contactbygroup[$p->id] }}</h6>
                                </div>
                              </div>
                          </div>
                          <div class="d-flex">
                            <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="btn btn-success-soft text-center w-50"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="btn btn-danger-soft text-center w-50">
                              <i class="fa fa-trash"></i>
                            </a>
                              <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
</main>



{{-- 
<main>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8 col-lg-6 vstack gap-4">
          
          <div class="card">
           
            <div class="card-header border-0 pb-0">
              <div class="row g-2">
                <div class="col-lg-2">
                
                  <h1 class="h4 card-title mb-lg-0">Group List</h1>
                </div>
                 <div class="col-sm-6 col-lg-3 ms-lg-auto">
                 
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div> 
                  <div class="col-sm-6 col-lg-3 ms-auto">
                
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('phonegroup.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Create Group</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Group Name')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($phonegroup as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->group_name}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route('phonegroup.edit',encryptor('encrypt',$p->id))}}" class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route('phonegroup.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
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
</main> --}}
@endsection

