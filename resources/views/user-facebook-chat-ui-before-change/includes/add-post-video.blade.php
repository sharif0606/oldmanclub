<div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form class="w-100" id="formSubmitVideo" enctype="multipart/form-data">
        <!-- Modal feed header START -->
        <div class="modal-header">
            <h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <!-- Modal feed header END -->

        <!-- Modal feed body START -->
        <div class="modal-body">
            <!-- Add Feed -->
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    @if ($client->image)
                    <img class="avatar-img rounded-circle"
                        src="{{ asset('public/uploads/client/' . $client->image) }}" alt="">
                    @else
                    <img class="avatar-img rounded-circle"
                        src="{{ asset('public/user/assets/images/avatar/03.jpg') }}" alt="">
                    @endif
                </div>
                <!-- Feed box  -->
                    <textarea class="form-control pe-4 fs-3 lh-1 border-0" id="message" name="message" rows="2" placeholder="Share your thoughts..."></textarea>
            </div>

            <!-- Dropzone photo START -->
            <div>
                <label class="form-label">Upload attachment</label>
                <div id="video-dropzone" data-dropzone='{"maxFiles":2}'>
                    <div class="dz-message">
                        <i class="bi bi-camera-reels display-3"></i>
                        <p>Drag here or click to upload video.</p>
                    </div>
                </div>
            </div>
            <!-- Dropzone photo END -->

        </div>
        <!-- Modal feed body END -->

        <!-- Modal feed footer -->
        <div class="modal-footer">
            <!-- Button -->
            {{-- <button type="button" class="btn btn-danger-soft me-2"><i
                    class="bi bi-camera-video-fill pe-1"></i> Live video</button> --}}
            <button type="button" class="btn btn-success-soft" id="submitBtnVideo">Post</button>
        </div>
        <!-- Modal feed footer -->
        </form>
    </div>
</div>
</div>