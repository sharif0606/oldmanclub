<div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="w-100" method="post" id="formSubmit" enctype="multipart/form-data">
                @csrf
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('public/user/assets/images/avatar/03.jpg') }}" alt="">
                        </div>
                        <!-- Feed box  -->

                        <textarea class="form-control pe-4 fs-3 lh-1 border-0" id="message" name="message" rows="2" placeholder="Share your thoughts..." required></textarea>

                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" id="postDropzone" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-images display-3"></i>
                                <p>Drag here or click to upload photo.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer ">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success-soft">Post</button>
                </div>
                <!-- Modal feed footer -->
            </form>
        </div>
    </div>
</div>
<!-- JavaScript code to initialize Dropzone -->
<script>
    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#postDropzone", {
        url: "{{ route('post.store') }}", // Set your server upload URL
        paramName: "file", // Name of the parameter that your backend expects
        maxFiles: 1, // Maximum number of files allowed
        maxFilesize: 5, // Maximum file size in MB
        acceptedFiles: "image/*", // Specify the accepted file types
        dictDefaultMessage: "Drag here or click to upload photo." // Default message shown in the Dropzone area
    });
</script>
 
