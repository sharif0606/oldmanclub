@extends('user.layout.app')
@section('title', 'create')
@section('content')

    <div class="card col-sm-12 shadow-lg">
        <div class="card-body">
            <form action="{{ route('nfc_card.store') }}" method="post" class="row">
                @csrf
                <div class="col-12">
                    <h6 class="border-bottom">NFC Card</h6>
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
                    @forelse ($nfc_fields as $value)
                        <div class="mb-1">
                            <label for="" class="form-label">{{$value->name}}</label>
                            <input type="text" class="form-control mb-1" id="" name="nfc_field_id[]"
                                placeholder="{{$value->name}}" required>

                            <select class="form-control" id="" name="card_type" required>
                                <option value="">No Label</option>
                                <option value="1">Home</option>
                                <option value="2">Personal</option>
                                <option value="3">Work</option>
                                <option value="3">Mobile</option>
                                <option value="3">Main</option>
                                <option value="3">Fax</option>
                                <option value="3">Direct</option>
                                <option value="3">Office</option>
                            </select>
                        </div>
                    @empty
                    @endforelse

                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add New NFC Card</button>
                </div>
            </form>
        </div>
    </div>

@endsection
