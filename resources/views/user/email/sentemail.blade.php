@extends('user.layout.base')
@section('title', 'Sent Email')
@section('content')
    <div class="compose-content">
        <form action="{{ route('store_email') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="to_email" class="form-control bg-transparent" placeholder=" To:">
            </div>
            <div class="form-group">
                <input type="text" name="subject" class="form-control bg-transparent" placeholder=" Subject:">
            </div>
            <div class="form-group">
                <textarea id="email-compose-editor" name="message" class="textarea_editor form-control bg-transparent" rows="15"
                    placeholder="Enter text ..."></textarea>
            </div>
            <hr>
            <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchment</h5>
            <div class="fallback w-100 mb-3">
                <input type="file" name="image_file" class="dropify" data-default-file="" />
            </div>
            <button class="btn btn-primary btn-sl-sm mr-3" type="submit"><span class="mr-2"><i
                        class="fa fa-paper-plane"></i></span> Send</button>
            <button class="btn btn-dark btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times"
                        aria-hidden="true"></i></span> Discard</button>
        </form>
    </div>
@endsection
