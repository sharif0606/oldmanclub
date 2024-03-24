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
                  <h1 class="h4 card-title mb-lg-0">Group</h1>
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
                  <a class="btn btn-primary-soft ms-auto w-100" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> <i class="fa-solid fa-plus pe-1"></i> Create group</a>
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
                      <div class="card">
                      <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <!-- Card body START -->
                          <div class="card-body text-center pt-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt=""></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"> <a href="group-details.html">{{ $p->group_name }}</a> </h5>
                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                            <!-- Group stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <!-- Group stat item -->
                              <div>
                                
                                <h6 class="mb-0">{{ $contactbygroup[$p->id] }}</h6>
                               
                                {{-- <small>Members</small> --}}
                              </div>
                              <!-- Divider -->
                              {{-- <div class="vr"></div> --}}
                              <!-- Group stat item -->
                              {{-- <div>
                                <h6 class="mb-0">20</h6>
                                <small>Post per day</small>
                              </div> --}}
                            </div>
                            <!-- Group stat END -->
                            <!-- Avatar group START -->
                            {{-- <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+22</span></div>
                              </li>
                            </ul> --}}
                            <!-- Avatar group END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card Footer START -->
                        {{-- <div class="card-footer text-center">
                          <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                        </div> --}}
                        <!-- Card Footer END -->
                      </div>
                      <!-- Card END -->
                    </div>
                    {{-- <div class="col-sm-6 col-lg-4">
                      <div class="card">
                        <div class="h-80px rounded-top" style="background-image:url({{ asset('public/user/assets/images/bg/02.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <div class="card-body text-center pt-0">
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/02.svg')}}" alt=""></a>
                            </div>
                            <h5 class="mb-0"><a href="group-details.html">Beauty queens</a></h5>
                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <div>
                                <h6 class="mb-0">23k</h6>
                                <small>Members</small>
                              </div>
                              <div class="vr"></div>
                              <div>
                                <h6 class="mb-0">12</h6>
                                <small>Post per day</small>
                              </div>
                            </div>
                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+13</span></div>
                              </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                          <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                      <div class="card">
                        <div class="h-80px rounded-top" style="background-image:url({{ asset('public/user/assets/images/bg/03.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <div class="card-body text-center pt-0">
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/09.svg')}}" alt=""></a>
                            </div>
                            <h5 class="mb-0"> <a href="group-details.html">Eternal triangle</a></h5>
                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <div>
                                <h6 class="mb-0">45k</h6>
                                <small>Members</small>
                              </div>
                              <div class="vr"></div>
                              <div>
                                <h6 class="mb-0">16</h6>
                                <small>Post per day</small>
                              </div>
                            </div>
                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+12</span></div>
                              </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                          <a class="btn btn-danger-soft btn-sm" href="#!"> Leave group </a>
                        </div>
                      </div>
                    </div> --}}
                    @endforeach
                  </div>
                  <!-- Friends' groups tab END -->

                <!-- Suggested for you START -->
                <div class="tab-pane fade" id="tab-2">
                  <div class="row g-4">
                    <div class="col-sm-6 col-lg-4">
                      <!-- Card START -->
                      <div class="card">
                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <!-- Card body START -->
                          <div class="card-body text-center pt-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/01.svg" alt=""></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"><a href="group-details.html">Real humans</a></h5>
                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                            <!-- Group stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">23k</h6>
                                <small>Members</small>
                              </div>
                              <!-- Divider -->
                              <div class="vr"></div>
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">12</h6>
                                <small>Post per day</small>
                              </div>
                            </div>
                            <!-- Group stat END -->
                            <!-- Avatar group START -->
                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+12</span></div>
                              </li>
                            </ul>
                            <!-- Avatar group END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card Footer START -->
                        <div class="card-footer text-center">
                          <a class="btn btn-danger-soft btn-sm" href="#!"> Leave group </a>
                        </div>
                        <!-- Card Footer END -->
                      </div>
                      <!-- Card END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                      <!-- Card START -->
                      <div class="card">
                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/02.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <!-- Card body START -->
                          <div class="card-body text-center pt-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/03.svg" alt=""></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"><a href="group-details.html">Strong signals</a></h5>
                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                            <!-- Group stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">45k</h6>
                                <small>Members</small>
                              </div>
                              <!-- Divider -->
                              <div class="vr"></div>
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">16</h6>
                                <small>Post per day</small>
                              </div>
                            </div>
                            <!-- Group stat END -->
                            <!-- Avatar group START -->
                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+05</span></div>
                              </li>
                            </ul>
                            <!-- Avatar group END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card Footer START -->
                        <div class="card-footer text-center">
                          <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                        </div>
                        <!-- Card Footer END -->
                      </div>
                      <!-- Card END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                      <!-- Card START -->
                      <div class="card">
                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/03.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                          <!-- Card body START -->
                          <div class="card-body text-center pt-0">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                               <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/05.svg" alt=""></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"><a href="group-details.html">Team yes, we can</a></h5>
                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                            <!-- Group stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">32k</h6>
                                <small>Members</small>
                              </div>
                              <!-- Divider -->
                              <div class="vr"></div>
                              <!-- Group stat item -->
                              <div>
                                <h6 class="mb-0">05</h6>
                                <small>Post per day</small>
                              </div>
                            </div>
                            <!-- Group stat END -->
                            <!-- Avatar group START -->
                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/14.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/13.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                              </li>
                              <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+08</span></div>
                              </li>
                            </ul>
                            <!-- Avatar group END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card Footer START -->
                        <div class="card-footer text-center">
                          <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                        </div>
                        <!-- Card Footer END -->
                      </div>
                      <!-- Card END -->
                    </div>
                  </div>
                </div>
                <!-- Suggested for you END -->

                <!-- Popular near you START -->
                <div class="tab-pane fade" id="tab-3">
                   <!-- Add group -->
                  <div class="my-sm-5 py-sm-5 text-center">
                    <i class="display-1 text-body-secondary bi bi-people"> </i>
                    <h4 class="mt-2 mb-3 text-body">No group founds</h4>
                    <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> Click here to add </button>
                  </div>
                </div>
                <!-- Popular near you END -->

                <!-- More suggestions START -->
                <div class="tab-pane fade" id="tab-4">
                   <!-- Add group -->
                  <div class="my-sm-5 py-sm-5 text-center">
                    <i class="display-1 text-body-secondary bi bi-people"> </i>
                    <h4 class="mt-2 mb-3 text-body">No group founds</h4>
                    <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> Click here to add </button>
                  </div>
                </div>
                <!-- More suggestions END -->

            </div>
          </div>
          <!-- Card body END -->
        </div>
        <!-- Card END -->
      </div>
      <!-- Right sidebar END -->

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>
<!-- Modal create group START -->
<div class="modal fade" id="modalCreateGroup" tabindex="-1" aria-labelledby="modalLabelCreateGroup" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Title -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreateGroup">Create Group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form START -->
        <form action="{{route('phonegroup.store')}}" method="post" class="row">
            @csrf
          <!-- Group name -->
          <div class="mb-3">
            <label class="form-label">Group name</label>
            <input type="text" name="group_name"  class="form-control" placeholder="Add Group name here">
          </div>
          {{-- <!-- Group picture -->
          <div class="mb-3">
            <label class="form-label">Group picture</label>
            <!-- Avatar upload START -->
            <div class="d-flex align-items-center">
              <div class="avatar-uploader me-3">
                <!-- Avatar edit -->
                <div class="avatar-edit">
                  <input type='file' id="avatarUpload" accept=".png, .jpg, .jpeg" />
                  <label for="avatarUpload"></label>
                </div>
                <!-- Avatar preview -->
                <div class="avatar avatar-xl position-relative">
                  <img id="avatar-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/placeholder.jpg" alt="">
                </div>
              </div>
              <!-- Avatar remove button -->
              <div class="avatar-remove">
                <button type="button" id="avatar-reset-img" class="btn btn-light">Delete</button>
              </div>
            </div>
            <!-- Avatar upload END -->
          </div>
          <!-- Select audience -->
          <div class="mb-3">
            <label class="form-label d-block">Select audience</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="PublicRadioOptions" id="publicRadio1" value="option1">
              <label class="form-check-label" for="publicRadio1">Public</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="PublicRadioOptions" id="privateRadio2" value="option2">
              <label class="form-check-label" for="privateRadio2">Private</label>
            </div>
          </div>
          <!-- Invite friend -->
          <div class="mb-3">
            <label class="form-label">Invite friend </label>
            <input type="text" class="form-control" placeholder="Add friend name here">
          </div>
          <!-- Group description -->
          <div class="mb-3">
            <label class="form-label">Group description </label>
            <textarea class="form-control" rows="3" placeholder="Description here"></textarea>
          </div> --}}
          <div class="modal-footer">
            <button type="submit" class="btn btn-success-soft">Create now</button>
          </div>
        </form>
        <!-- Form END -->
      </div>
      <!-- Modal footer -->
      
    </div>
  </div>
</div>
<!-- Modal create group END -->



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

