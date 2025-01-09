@extends('user.layout.base')
@section('title', 'create NFC Card')
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
                <h4 class="card-title h4">New NFC CARD</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i
                        class="fas fa-list pe-1"></i>All NFC CARD</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        <div class="card col-sm-12 shadow-lg">
                            <div class="card-body">
                                <form action="{{ route('nfc_card.store') }}" method="post" class="row">
                                    @csrf
                                    <div class="col-12">
                                        <h6 class="border-bottom">Card Name</h6>
                                        <input type="text" class="form-control mb-3" id="" name="card_name" placeholder="Card Name"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-control mb-3" id="" name="card_type" required>
                                            <option value="">Select Card Type</option>
                                            <option value="1">Work</option>
                                            <option value="2">Personal</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="border-bottom">NFC Information</h6>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label for="">Prefix</label>
                                                <input type="text" name="prefix" id="" class="form-control">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="">Preferred Name</label>
                                                <input type="text" name="preferred_name" id="" class="form-control">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="">Maiden Name</label>
                                                <input type="text" name="maiden_name" id="" class="form-control">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="">Suffix</label>
                                                <input type="text" name="suffix" id="" class="form-control">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="">Accreditations</label>
                                                <input type="text" name="accreditations" id="" class="form-control">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="">Pronoun</label>
                                                <input type="text" name="pronoun" id="" class="form-control">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="">Department</label>
                                                <input type="text" name="department" id="" class="form-control">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="">Company</label>
                                                <input type="text" name="company" id="" class="form-control">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="">Headline</label>
                                                <input type="text" name="headline" id="" class="form-control">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="">Title</label>
                                                <textarea name="title" id="" class="form-control" name="pronoun"></textarea>
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="col-12">
                                        <h6 class="border-bottom">NFC Design</h6>
                                        <select class="form-control mb-3" id="" name="design_card_id" required>
                                            <option value="">Select Card Design</option>
                                            <option value="1">Classic</option>
                                            <option value="2">Flat</option>
                                            <option value="3">Modern</option>
                                            <option value="4">Sleek</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="border-bottom">NFC Field</h6>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="card bg-primary text-white" style="max-height:400px;overflow-y:scroll;">
                                                    <div class="card-body" id="selected-fields">
                                                        Click the field you want to add to your card.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5" id="field-gallery">
                                                @forelse ($nfc_fields as $value)
                                                    <button type="button" data-field="{{ $value->name }}" data-id="{{ $value->id }}"
                                                        style="margin:2px 1px"
                                                        class="field-item btn btn-primary btn-sm text-white rounded-pill"><span
                                                            class="mx-1"><i
                                                                class="{{ $value->icon }}"></i></span>{{ $value->name }}</button>
                    
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add New NFC Card</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Photos of you tab END -->
                </div>
                <!-- Album Tab content END -->
            </div>
            <!-- Card body END -->
        </div>
        <!-- Card END -->
    </div>
</div><!-- Row END -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Function to add selected field to another box
            function addSelectedField(field, id) {
                console.log(field);
                console.log(id);
                var selectedFieldHtml = '<div class="selected-field-item px-3 my-1">\
                                                                            <label for="' + field.toLowerCase() +
                    '" class="form-label d-flex justify-content-between">' + field + '<span class="delete-btn"><i class="fa fa-close"></i></span></label>\
                                                                            <input type="text" class="form-control" id="' +
                    field
                    .toLowerCase() +
                    '" name="field_value[' + id + ']" placeholder="' + field.toLowerCase() +
                    '">\
                                                                            <input type="hidden" class="form-control" value="' +
                    id + '" name="nfc_field_id[]">\
                                                                        </div>';
                $('#selected-fields').append(selectedFieldHtml);
            }

            // Event handler for clicking on a field in the gallery
            $('#field-gallery').on('click', '.field-item', function() {
                var field = $(this).data('field');
                var id = $(this).data('id');
                addSelectedField(field, id);
            });
            // Event handler for clicking on delete button
            $('#selected-fields').on('click', '.delete-btn', function() {
                $(this).parents().parent('.selected-field-item').remove();
            });
        });
    </script>
@endpush
