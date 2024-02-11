@extends('user.layout.app')
@section('title', 'Edit')
@section('content')

    <div class="card col-sm-12 shadow-lg">
        <div class="card-body">
            <form action="{{ route('nfc_card.update',encryptor('encrypt',$nfc_card->id)) }}" method="post" class="row">
                @csrf
                @method('PATCH')
                <div class="col-12">
                    <h6 class="border-bottom">NFC Card</h6>
                    <input type="text" class="form-control mb-3" id="" name="card_name" placeholder="Card Name"
                        required value="{{ $nfc_card->card_name }}">
                </div>
                <div class="col-12">
                    <select class="form-control mb-3" id="" name="card_type" required>
                        <option value="">Select Card Type</option>
                        <option value="1" @if ($nfc_card->card_type == 1) selected @endif>Work</option>
                        <option value="2" @if ($nfc_card->card_type == 2) selected @endif>Personal</option>
                    </select>
                </div>
                <div class="col-12">
                    <h6 class="border-bottom">NFC Information</h6>
                     <div class="row">
                        <div class="col-4 form-group">
                            <label for="">Prefix</label>
                            <input type="text" name="prefix" value="{{ $nfc_card->nfc_info->prefix }}" id="" class="form-control">
                        </div>
                        <div class="col-4 form-group">
                            <label for="">Preferred Name</label>
                            <input type="text" name="preferred_name" value="{{ $nfc_card->nfc_info->preferred_name }}" id="" class="form-control">
                        </div>
                        <div class="col-4 form-group">
                            <label for="">Maiden Name</label>
                            <input type="text" name="maiden_name" value="{{ $nfc_card->nfc_info->maiden_name }}" id="" class="form-control">
                        </div>
                        <div class="col-4 form-group">
                            <label for="">Suffix</label>
                            <input type="text" name="suffix" value="{{ $nfc_card->nfc_info->suffix }}" id="" class="form-control">
                        </div>
                        <div class="col-4 form-group">
                            <label for="">Accreditations</label>
                            <input type="text" name="accreditations" value="{{ $nfc_card->nfc_info->accreditations }}" id="" class="form-control">
                        </div>
                        <div class="col-4 form-group">
                            <label for="">Pronoun</label>
                            <input type="text" name="pronoun" value="{{ $nfc_card->nfc_info->pronoun }}" id="" class="form-control">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Department</label>
                            <input type="text" name="department" value="{{ $nfc_card->nfc_info->department }}" id="" class="form-control">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Company</label>
                            <input type="text" name="company"  value="{{ $nfc_card->nfc_info->company }}" id="" class="form-control">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Headline</label>
                            <input type="text" name="headline" value="{{ $nfc_card->nfc_info->headline }}" id="" class="form-control">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Title</label>
                            <textarea name="title" id="" class="form-control" name="pronoun">{{ $nfc_card->nfc_info->title }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="border-bottom">NFC Design</h6>
                    <select class="form-control mb-3" id="" name="design_card_id" required>
                        <option value="">Select Card Design</option>
                        <option value="1" @if ($nfc_card->card_type == 1) selected @endif>Classic</option>
                        <option value="2" @if ($nfc_card->card_type == 2) selected @endif>Flat</option>
                        <option value="3" @if ($nfc_card->card_type == 3) selected @endif>Modern</option>
                        <option value="4" @if ($nfc_card->card_type == 4) selected @endif>Sleek</option>
                    </select>
                </div>
                <div class="col-12">
                    <h6 class="border-bottom">NFC Field</h6>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card bg-primary text-white" style="background-color: #ff6347;">
                                <div class="card-body" id="selected-fields">
                                    @forelse ($nfc_card->nfcFields as $value)
                                    {{--$value--}}
                                        <div class="selected-field-item px-3 my-1">
                                            <label for="{{$value->name}}" class="form-label d-flex justify-content-between">{{$value->name}}<span
                                                    class="delete-btn"><i class="fa fa-close"></i></span></label>
                                            <input type="text" class="form-control" id="" name="field_value[{{$value->pivot->nfc_field_id}}]"
                                                placeholder="{{$value->name}}" value="{{$value->pivot->field_value}}">
                                            <input type="hidden" class="form-control" value="{{$value->pivot->nfc_field_id}}" name="nfc_field_id[]">
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="field-gallery">
                            @forelse ($nfc_fields as $value)
                                <button type="button" data-field="{{ $value->name }}" data-id="{{ $value->id }}"
                                    style="margin:2px 1px"
                                    class="field-item btn btn-secondary btn-sm text-white rounded-pill"><span
                                        class="mx-1"><i class="fa fa-home"></i></span>{{ $value->name }}</button>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update NFC Card</button>
                </div>
            </form>
        </div>
    </div>

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
                                                    <input type="text" class="form-control" id="' + field.toLowerCase() +
                    '" name="field_value[' + id + ']" placeholder="' + field.toLowerCase() + '">\
                                                    <input type="hidden" class="form-control" value="' + id + '" name="nfc_field_id[]">\
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
