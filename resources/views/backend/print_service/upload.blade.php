@extends('backend.layouts.app')
@section('title',trans('Printing Service'))
@section('page',trans('List'))
@section('content')
<form class="form" method="post" enctype="multipart/form-data" action="{{route('uploadfile_store', encryptor('encrypt', $print_service->id))}}">
    @csrf
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="image">Select Multiple Service Image<i class="text-danger">*</i></label>
            <input type="file" id="image" class="form-control" value="{{ old('image')}}" name="image[]" multiple>
            @if($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div id="preview_container"></div>
        <div class="form-check d-flex" id="is_featured_container">
            <!-- Checkbox for the first image -->
            <input class="form-check-input" type="checkbox" id="is_featured_0" name="is_featured[]" value="1">
            <label class="form-check-label" for="is_featured_0">Mark as Featured Image 1</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>



<script>
    document.getElementById('image').addEventListener('change', function(event) {
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

    document.getElementById('image').addEventListener('change', function(event) {
        const files = event.target.files;
        const isFeaturedContainer = document.getElementById('is_featured_container');
        isFeaturedContainer.innerHTML = ''; // Clear previous checkboxes

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const checkboxId = 'is_featured_' + i;
            const checkboxLabel = 'Mark as Featured Image' + (i + 1);

            // Create checkbox elements for each image
            const checkboxDiv = document.createElement('div');
            checkboxDiv.classList.add('form-check');

            const checkboxInput = document.createElement('input');
            checkboxInput.setAttribute('type', 'checkbox');
            checkboxInput.setAttribute('id', checkboxId);
            checkboxInput.setAttribute('name', 'is_featured[]');
            checkboxInput.setAttribute('value', '1');
            checkboxInput.classList.add('form-check-input');

            const checkboxInputLabel = document.createElement('label');
            checkboxInputLabel.setAttribute('for', checkboxId);
            checkboxInputLabel.classList.add('form-check-label');
            checkboxInputLabel.textContent = checkboxLabel;

            // Append checkbox and label to the container
            checkboxDiv.appendChild(checkboxInput);
            checkboxDiv.appendChild(checkboxInputLabel);
            isFeaturedContainer.appendChild(checkboxDiv);
        }
    });
</script>
@endsection