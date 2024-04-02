@extends('user.layout.base')
@section('title', 'Inbox')
@section('content')
<main>
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
                    <div class="card-header d-sm-flex align-items-center text-center justify-content-sm-between border-0 pb-0">
                        <h1 class="h4 card-title">Inbox</h1>
                        <a class="btn btn-primary" href="{{ route('sent_email_create') }}" >Compose</a>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mb-0 pb-0">
                            <div class="tab-pane fade show active" id="tab-1">
                                <div class="row g-4">
                                    @forelse ($receive_email as $e)
                                        <div class="message">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="custom-control custom-checkbox pl-4">
                                                        <input type="checkbox">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            {{ $e->to_email }}<br>
                                                            {{ $e->subject }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Email Found</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</main>

    {{-- <div class="p-0">
        <a href="{{ route('sent_email_create') }}" class="btn btn-primary mb-2">Compose</a>
    </div>
    <div class="card p-3">
        <div class="email-list mt-4">
            @forelse ($receive_email as $e)
                <div class="message">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="custom-control custom-checkbox pl-4">
                                <input type="checkbox">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star"
                                    aria-hidden="true"></i></button>
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $e->to_email }}<br>
                                    {{ $e->subject }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Email Found</p>
            @endforelse
        </div>
        <!-- panel -->
        <div class="row mt-4 m-4 mx-sm-4">
            <div class="col-7">
                <div class="text-left">1 - 20 of 568</div>
            </div>
            <div class="col-5">
                <div class="btn-group float-right">
                    <button class="btn btn-dark" type="button"><i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-dark" type="button"><i class="fa fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
