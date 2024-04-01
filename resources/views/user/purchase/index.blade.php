@extends('user.layout.base')
@section('title','Phonebook')
@section('content')
<main>
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">
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
                <div class="col-lg-3">
                  <!-- Card title -->
                  <h1 class="h4 card-title mb-lg-0">Purchase List</h1>
                </div>
                {{--  <div class="col-sm-6 col-lg-3 ms-lg-auto">
                  <!-- Select Groups -->
                  <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
                    <option value="AB">Alphabetical</option>
                    <option value="NG">Newest group</option>
                    <option value="RA">Recently active</option>
                    <option value="SG">Suggested</option>
                  </select>
                </div>  --}}
                  <div class="col-sm-6 col-lg-3 ms-auto">
                  <!-- Button modal -->
                  <a class="btn btn-primary-soft ms-auto w-100" href="{{route('purchase.create')}}"> <i class="fa-solid fa-plus pe-1"></i> Purchase SMS</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        @forelse($data as $p)
                            <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100">
                                        @if($p->package->image)
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/uploads/sms/'.$p->package->image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @else
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @endif
                                        <div class="card-body text-center pt-0">
                                            {{-- <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="#"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="{{ asset('public/user/assets/images/logo/08.svg') }}" alt=""></a>
                                            </div> --}}
                                            
                                            <h5 class="mb-0"><a href="#">@if($p->package?->package_type == 1){{ 'Regular' }} @else {{ 'Validity' }} @endif</a> </h5>
                                            <span class="fs-6 fw-bold text-dark px-2">Title:</span><span>{{ $p->package?->title }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Number Of SMS:</span><span>{{ $p->package?->number_of_sms }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Remaining SMS:</span><span>{{ $p->number_of_sms }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Uses SMS:</span><span>{{ $p->uses_sms }}</span><br>
                                            @if($p->package->package_type == 2)
                                              <span class="fs-6 fw-bold text-dark px-2">Validity:</span><span>{{ $p->created_at->addDays($p->validity_count)->diffForHumans($p->created_at) }}</span><br>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            @empty
                            <p>"You have not purchased any package."</p>
                            @endforelse
                        
                    </div>
                </div>
            </div>
            {{-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="phone_book">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Purchase SMS')}}</th>
                                <th scope="col">{{__('Remaining SMS')}}</th>
                                <th scope="col">{{__('Uses SMS')}}</th>
                                
                                <th scope="col">{{__('Validity')}}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{ $p->package?->title }}</td>
                                <td>{{ $p->package?->number_of_sms }}</td>
                                <td>{{ $p->number_of_sms }}</td>
                                <td>{{ $p->uses_sms }}</td>
                                <td>{{ $p->package->validity_days }} day</td>
                                
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection