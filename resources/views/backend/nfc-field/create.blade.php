@extends('backend.layouts.app')

@section('title', trans('NFC Field'))
@section('page', trans('Create'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data"
                            action="{{ route('nfc-field.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Type<i class="text-danger">*</i></label>
                                        <select class="form-control" name="type" onchange="handleTypeChange(this)">
                                            <option value="">Select Type</option>
                                            @foreach ($type as $v => $k )
                                                <option value="{{ $v }}">{{ $k }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger"> {{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name<i class="text-danger">*</i></label>
                                        <input type="text" id="name" class="form-control"
                                            value="{{ old('name') }}" name="name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger"> {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="icon" id="textLabel">Icon<i class="text-danger">*</i></label>
                                        <textarea id="icon_text" class="form-control d-none" value="{{ old('icon_text')}}" name="svg_icon" cols="30" rows="10"></textarea>
                                        <input type="file" id="icon_file" class="form-control d-none" value="{{ old('icon_file')}}" name="iconPic">
                                        <select class="form-control" name="icon" id="icon_select">
                                            <option value="">Select Icon</option>
                                            <option value="fas fa-globe">Web</option>
                                            <option value="fas fa-envelope-open">Email</option>
                                            <option value="fas fa-phone">Phone</option>
                                        </select>
                                        @if ($errors->has('icon'))
                                            <span class="text-danger"> {{ $errors->first('icon') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                        <label for="name">Category</label>
                                        <select class="form-control" name="category">
                                            <option value="">Select Type</option>
                                            @foreach ($categories as $v => $k )
                                                <option value="{{ $v }}">{{ $k }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="text-danger"> {{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                    </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status<i class="text-danger">*</i></label>
                                        <select id="status" class="form-control" name="status">
                                            <option value="">select status</option>
                                            <option value="1" @if (old('status') == 1) selected @endif>Show
                                            </option>
                                            <option value="2" @if (old('status') == 2) selected @endif>Hide
                                            </option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function handleTypeChange(e) {
            const iconFile = document.getElementById('icon_file');
            const iconSelect = document.getElementById('icon_select');
            const iconText = document.getElementById('icon_text');
            const textLabel = document.getElementById('textLabel');
            if(e.value == 3){
                iconFile.classList.remove('d-none');
                iconSelect.classList.add('d-none');
                iconText.classList.add('d-none');
                textLabel.innerHtml = 'Upload Icon';
            }else if(e.value == 2){
                iconFile.classList.add('d-none');
                iconText.classList.remove('d-none');
                iconSelect.classList.add('d-none');
                textLabel.innterText = 'Icon Text';
            }else{
                iconFile.classList.add('d-none');
                iconText.classList.add('d-none');
                iconSelect.classList.remove('d-none');
                textLabel.innterText = 'Select Icon';
            }
        }
    </script>
@endpush
