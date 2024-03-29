@extends('user.layout.app')
@section('title', 'Company')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('company.update',encryptor('encrypt',$company->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Company Name <i class="text-danger">*</i></label>
                                    <input type="text" id="company_name" class="form-control" value="{{ old('company_name',$company->company_name)}}" name="company_name">
                                    @if($errors->has('company_name'))
                                        <span class="text-danger"> {{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Company Logo <i class="text-danger">*</i></label>
                                    <input type="file" id="company_logo" class="form-control" value="{{ old('company_logo',$company->company_logo)}}" name="company_logo">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Contact no</label>
                                    <input type="text" id="contact_no" class="form-control" value="{{ old('contact_no',$company->contact_no)}}" name="contact_no">
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email <i class="text-danger">*</i></label>
                                    <input type="text" id="email" class="form-control" value="{{ old('email',$company->email)}}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number <i class="text-danger">*</i></label>
                                    <input type="text" id="phone_number" class="form-control" value="{{ old('phone_number',$company->phone_number)}}" name="phone_number">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city">City<i class="text-danger">*</i></label>
                                    <input type="text" id="city" class="form-control" value="{{ old('city',$company->city)}}" name="city">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="state">State<i class="text-danger">*</i></label>
                                    <input type="text" id="state" class="form-control" value="{{ old('state',$company->state)}}" name="state">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code<i class="text-danger">*</i></label>
                                    <input type="text" id="zip_code" class="form-control" value="{{ old('zip_code',$company->zip_code)}}" name="zip_code">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="address">Address<i class="text-danger">*</i></label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ old('address',$company->address)}}</textarea>
                                    <!-- <input type="text" id="address" class="form-control" value="{{ old('address',$company->address)}}" name="address"> -->
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description<i class="text-danger">*</i></label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description',$company->description)}}</textarea>
                                    <!-- <input type="text" id="description" class="form-control" value="{{ old('description',$company->description)}}" name="description"> -->
                                </div>
                            </div>
                             <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="documents">Upload Documents (jpg, png, pdf, doc):</label>
                                    <input type="file" id="company_document" class="form-control" name="company_document[]" accept="image/jpeg,image/png,application/pdf,application/txt,application/msword,application/vnd.openxmlformats-officedcoument.wordprocessingml.document" multiple>
                                    <div id="preview_container"></div>
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


<script>
    document.getElementById('company_document').addEventListener('change', function(event) {
            var input = event.target;
            var previewContainer = document.getElementById('preview_container');

            // Clear previous previews
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.style.maxWidth = '100px';
                        preview.style.marginRight = '5px'; // Add some space between images
                        previewContainer.appendChild(preview); // Append each preview image
                    }

                    reader.readAsDataURL(input.files[i]); // Convert to data URL
                }
            }
        });
</script>
@endsection