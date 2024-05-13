<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="w-100" id="editFormSubmit" enctype="multipart/form-data">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Edit Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <input type="hidden" id="postId">
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
                        <textarea class="form-control pe-4 lh-1 border-0" id="editMessage" name="message" rows="2" placeholder="Share your thoughts..."></textarea>
                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div id="editPostDropzone">
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
                <div class="modal-footer row justify-content-between">
                    {{-- <div class="col-lg-3">
                        <select class="form-select" id="editPrivacy" aria-label="Default select example">
                            <option value="public">Public</option>
                            <option value="only_me">Only Me</option>
                        </select>
                    </div> --}}
                    <div class="col-lg-8 text-sm-end">
                        <!-- Button -->
                        <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success-soft" id="editSubmitBtn">Update</button>
                        <!-- Button -->
                    </div>
                </div>
                <!-- Modal feed footer -->
            </form>
        </div>
    </div>
</div>
