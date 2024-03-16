@extends('user.layout.base')
@section('title', 'Inbox')
@section('content')
    <div class="p-0">
        <a href="{{ route('sent_email_create') }}" class="btn btn-primary">Compose</a>
    </div>
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
@endsection
