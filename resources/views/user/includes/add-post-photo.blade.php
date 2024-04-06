<div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="w-100" id="formSubmit" enctype="multipart/form-data">
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
                        <div id="postDropzone">
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
                    <div class="col-lg-3">
                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choice-select-text-none choices__input" data-position="top" data-search-enabled="false" hidden="" tabindex="-1" data-choice="active"><option value="PB" data-custom-properties="[object Object]">Public</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="PB" data-custom-properties="[object Object]" aria-selected="true">Public</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--os0g-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="PV" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Custom</div><div id="choices--os0g-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Friends</div><div id="choices--os0g-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Only me</div><div id="choices--os0g-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="PB" data-select-text="Press to select" data-choice-selectable="">Public</div></div></div></div>
                    
                    </div>
                    <div class="col-lg-8 text-sm-end">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                    <!-- Button -->
                    </div>

                </div>
                <!-- Modal feed footer -->
            </form>
        </div>
    </div>
</div>

