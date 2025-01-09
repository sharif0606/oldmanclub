@extends('user.layout.base')
@section('title', 'Company')
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
                <h4 class="card-title h4">UPDATE COMPANY</h4>
                <a class="btn btn-primary-soft" href="{{ route('company.index') }}"> <i
                        class="fas fa-list pe-1"></i>ALL COMPANY</a>
            </div>
            <div class="card-body">
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        <div class="card col-sm-12 shadow-lg">
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
                                                <label for="">Company Image <i class="text-danger">*</i></label>
                                                <input type="file" id="company_image" class="form-control" value="{{ old('company_image',$company->company_image)}}" name="company_image">
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

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="city">City<i class="text-danger">*</i></label>
                                                <input type="text" id="city" class="form-control" value="{{ old('city',$company->city)}}" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="state">State<i class="text-danger">*</i></label>
                                                <input type="text" id="state" class="form-control" value="{{ old('state',$company->state)}}" name="state">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code<i class="text-danger">*</i></label>
                                                <input type="text" id="zip_code" class="form-control" value="{{ old('zip_code',$company->zip_code)}}" name="zip_code">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="address">Address<i class="text-danger">*</i></label>
                                                <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ old('address',$company->address)}}</textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="description">Description<i class="text-danger">*</i></label>
                                                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description',$company->description)}}</textarea>
                                                
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
        </div>
    </div>
</div>


{{-- <div class="row">
    <div class="col-12">
        <div class="card p-5">
            <div class="card-content">
                <h4 class="text-center">Add A New Company Information</h4>
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
                                    
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description<i class="text-danger">*</i></label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description',$company->description)}}</textarea>
                                    
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
</div> --}}


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
