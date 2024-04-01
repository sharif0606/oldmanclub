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
                <h4 class="card-title h4">Purchase SMS</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('purchase.index') }}"> <i
                        class="fas fa-list pe-1"></i>All Purchase Package</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        @forelse($sms as $p)
                            <div class="col-sm-6 col-lg-4">
                                <form action="{{ route('purchase.store') }}" method="post" class="row">
                                    @csrf
                                    <div class="card">
                                        @if($p->image)
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/uploads/sms/'.$p->image)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @else
                                        <div class="h-80px rounded-top" style="background-image: url({{asset('public/user/assets/images/bg/firstimg.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        @endif
                                        <div class="card-body text-center pt-0">
                                            
                                            <h5 class="mb-0"><a href="#">@if($p->package_type == 1){{ 'Regular' }} @else {{ 'Validity' }} @endif</a> </h5>
                                            <span class="fs-6 fw-bold text-dark px-2">Title:</span><span>{{ $p->title }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Number Of SMS:</span><span>{{ $p->number_of_sms }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Validity:</span><span>{{ $p->validity_days }}</span><br>
                                            <span class="fs-6 fw-bold text-dark px-2">Price:</span><span>{{ $p->price }}</span>
                                            <span class="fs-6 fw-bold text-dark px-2">Discount:</span><span>{{ $p->discount }}%</span>
                                            <h6 class="mb-0">Discount Price: <a href="#">{{ $p->discount_price }}</a> </h6>
                                        </div>
                                        <div class="d-flex">
                                            <input type="hidden" name="smspackage_id" value="{{ $p->id }}">
                                            <input type="hidden" name="number_of_sms" value="{{ $p->number_of_sms }}">
                                            {{-- <input type="hidden" name="validity_count" value="{{ $p->validity_days }}"> --}}
                                            <button type="submit" class="btn btn-success-soft w-100 px-3 ">Purchase</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @empty
                            <p>Package Not Found</p>
                            @endforelse
                        {{-- <div class="card col-sm-12 shadow-lg">
                            <div class="card-body">
                                <form action="{{ route('purchase.store') }}" method="post" class="row">
                                    @csrf
                                    <div class="col-12">
                                        <select name="smspackage_id" id="smspackage_id" class="form-control mb-3">
                                            <option value="">Select Package</option>
                                            @foreach($sms as $s)
                                                <option value="{{ $s->id }}" data-sms-count="{{ $s->number_of_sms }}" data-created-at="{{ $s->created_at }}">{{ $s->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control mb-3" id="number_of_sms" name="number_of_sms" placeholder="Number of sms" readonly>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control mb-3" id="validity_count" name="validity_count" placeholder="Validity Count">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-3">Purchase</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main>
  <!-- Container START -->
    {{-- <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                <div class="bg-mode p-4">
                    <p class="fs-4">Purchase SMS package</p>
                    <div class="compose-content">
                        <form action="{{ route('purchase.store') }}" method="post" class="row">
                            @csrf
                            <div class="col-12">
                                <select name="smspackage_id" id="smspackage_id" class="form-control mb-3">
                                    <option value="">Select Package</option>
                                    @foreach($sms as $s)
                                        <option value="{{ $s->id }}" data-sms-count="{{ $s->number_of_sms }}" data-created-at="{{ $s->created_at }}">{{ $s->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="number_of_sms" name="number_of_sms" placeholder="Number of sms" readonly>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" id="validity_count" name="validity_count" placeholder="Validity Count">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-3">Purchase</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
  <!-- Container END -->
</main>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#smspackage_id").change(function() {
            var selectedOption = $(this).find(":selected");
            var smsCount = selectedOption.data("sms-count");
            $("#number_of_sms").val(smsCount);

            var createdAt = selectedOption.data("created-at");
            var packageCreatedAt = new Date(createdAt);
            var currentDate = new Date();
            var differenceInMilliseconds = currentDate.getTime() - packageCreatedAt.getTime();
            var differenceInDays = Math.floor(differenceInMilliseconds / (1000 * 60 * 60 * 24));
            $("#validity_count").val(differenceInDays);
        });
    });
</script> --}}
@endsection
