@extends('user.layout.app')
@section('title','Inbox Email')
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
                        <a href="{{route('inbox')}}" class="list-group-item email-link"><i class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span class="badge badge-primary badge-sm float-right">198</span></a>
                        <a href="{{route('sentbox')}}" class="list-group-item email-link"><i class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> 
                        <a href="" class="list-group-item email-link"><i class="fa fa-star font-18 align-middle mr-2"></i>Important <span class="badge badge-danger text-white badge-sm float-right">47</span>
                        </a>
                        <a href="javascript:void()" class="list-group-item email-link"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a>
                        <a href="javascript:void()" class="list-group-item email-link"><i class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
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
                @yield('content')
               
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your JavaScript code -->
<script>
    $(document).ready(function(){
        // Initially hide all content
        $(".content-to-toggle").hide();

        // Handle click on any email link
        $(".email-link").click(function(){
            // Hide all content sections
            $(".content-to-toggle").hide();

            // Show the corresponding content section
            var targetContentId = $(this).attr("href").replace('#', '');
            $("#" + targetContentId + "-content").show();
        });
    });
</script>


@endsection