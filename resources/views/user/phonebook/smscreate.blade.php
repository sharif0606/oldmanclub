@extends('user.layout.base')
@section('title','sms store')
@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="d-flex align-items-center d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
            </button>
        </div>
        @include('user.includes.profile-navbar')
    </div>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <div class="card">
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">Send SMS</h4>
                <a class="btn btn-primary-soft" href="{{ route('sms_send') }}"> <i
                        class="fas fa-list pe-1"></i>All SMS</a>
            </div>
            <div class="card-body">
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                    <div class="card col-sm-4 shadow-lg">
                        @forelse($phonebook as $p)
                        <div class="">
                            <span class="pe-2">
                            <input type="checkbox" name="selected_contact[]" class="contact-checkbox" data-contact="{{ $p->contact_en }}" data-name="{{ $p->name_en }}">
                            </span>
                            <span><strong>{{ $p->name_en }}</strong></span>
                            <p class="ps-4"><strong>{{ $p->contact_en }}</strong></p>
                        </div>
                        @empty
                            <p>Phonebook Not Found</p>
                        @endforelse
                    </div>
                    <div class="card col-sm-7 shadow-lg ms-2">
                        <div class="card-body">
                            <form action="{{ route('sms_store') }}" method="post" class="row">
                                @csrf
                                <div class="form-group">
                                    <select name="purchase_id" id="" class="form-control mb-3">
                                        <option value="">Select Package</option>
                                        @forelse($purchase as $p)
                                            <option value="{{ $p->id }}">{{ $p->package?->title }}<span class="">(remaining sms:{{ $p->number_of_sms }}) </span></option>
                                        @empty
                                        <p>Package Not found</p>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="selected_contact_input" name="contact_no" placeholder="Contact No" style="display: none">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="selected_name_input" value="" placeholder="Contact No">
                                </div>
                                <div class="form-group">
                                    <textarea id="" name="message_body" placeholder="Write your message" class="form-control mb-3" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary px-3">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    $(document).ready(function() {
        const $checkboxes = $('.contact-checkbox');
        const $selectedContactInput = $('#selected_contact_input');
        $checkboxes.on('change', function() {
            let selectedContacts = '';
            $checkboxes.filter(':checked').each(function() {
                const contact = $(this).data('contact');
                console.log("Contact:", contact); 
                selectedContacts += contact + ',';
            });
            selectedContacts = selectedContacts.slice(0, -1);
            console.log("Selected Contacts:", selectedContacts);
            $selectedContactInput.val(selectedContacts);
        });
    });
    $(document).ready(function() {
        const $checkboxes = $('.contact-checkbox');
        const $selectedNameInput = $('#selected_name_input');
        $checkboxes.on('change', function() {
            let selectedNames = '';
            $checkboxes.filter(':checked').each(function() {
                const name = $(this).data('name');
                console.log("Name:", name); 
                selectedNames += name + ',';
            });
            selectedNames = selectedNames.slice(0, -1);
            console.log("Selected Contacts:", selectedNames);
            $selectedNameInput.val(selectedNames);
        });
    });
</script>


{{-- <main>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                <div class="bg-mode p-4">
                    <div class="compose-content">
                        <form action="{{ route('sms_store') }}" method="post" class="row">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" id="" name="contact_no" placeholder="contact no">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" id="" name="message_body" placeholder="write your message">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> --}}
@endsection