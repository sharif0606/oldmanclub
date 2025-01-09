@extends('user.layout.base')
@section('title','Sent Email')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <span class="ml-1">Email</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="email-left-box px-0 mb-5">
                    <div class="p-0">
                        <a href="{{route('sent_email_create')}}" class="btn btn-primary btn-block">Compose</a>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="{{route('inbox')}}" class="list-group-item active">
                            <i class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span class="badge badge-primary badge-sm float-right">198</span>
                        </a>
                        <a href="{{route('sentbox')}}" class="list-group-item"><i
                                class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a>
                        <a href="" class="list-group-item"><i
                                class="fa fa-star font-18 align-middle mr-2"></i>Important <span
                                class="badge badge-danger text-white badge-sm float-right">47</span>
                        </a>
                        <a href="javascript:void()" class="list-group-item"><i
                                class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                    </div>
                    <div class="intro-title d-flex justify-content-between">
                        <h5>Categories</h5>
                        <i class="icon-arrow-down" aria-hidden="true"></i>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-warning"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Work </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-primary"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Private </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-success"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Support </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-dpink"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Social </a>
                    </div>
                </div>
                <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                    <div class="toolbar mb-4" role="toolbar">
                        <div class="btn-group mb-1">
                            <button type="button" class="btn btn-dark"><i class="fa fa-archive"></i>
                            </button>
                            <button type="button" class="btn btn-dark"><i
                                    class="fa fa-exclamation-circle"></i>
                            </button>
                            <button type="button" class="btn btn-dark"><i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="btn-group mb-1">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder"></i> <b
                                    class="caret m-l-5"></b>
                            </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Social</a> <a class="dropdown-item" href="javascript: void(0);">Promotions</a> <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                            </div>
                        </div>
                        <div class="btn-group mb-1">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i> <b
                                    class="caret m-l-5"></b>
                            </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Updates</a> <a class="dropdown-item" href="javascript: void(0);">Social</a> <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                            </div>
                        </div>
                        <div class="btn-group mb-1">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">More <span class="caret m-l-5"></span>
                            </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                <a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                            </div>
                        </div>
                    </div>
                    <div class="compose-content">
                        <div class="row">
                            <div class="col-sm-2"><img src="{{asset('public/uploads/client/'.$client->image)}}" class="img-fluid rounded-circle" width="75px" alt=""></div>
                            <div class="col-sm-4">{{$client->first_name_en}} {{$client->middle_name_en}} {{$client->last_name_en}}
                                <br>
                                {{ $sentmail->created_at->format('d-M-Y') }}
                            </div>
                            <div class="col-sm-6">
                                <p class="pull-right">
                                    <a href="javascript:void()" class="text-muted ">
                                        <i class="fa fa-reply"></i>
                                    </a>
                                    <a href="javascript:void()" class="text-muted ml-3">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                    <a href="javascript:void()" class="text-muted ml-3">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {{$sentmail->subject}}
                                <br>
                                To:{{$sentmail->to_email}}
                            </div>
                            <div class="col-sm-6">
                                <p class="pull-right">
                                    {{ $sentmail->created_at->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-12">
                                 {{$sentmail->message}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <embed src="{{asset('public/uploads/emails/'.$sentmail->file)}}" class="" width="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
