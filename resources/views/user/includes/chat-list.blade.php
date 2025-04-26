<!-- Chat sidebar START -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
    <!-- Offcanvas header -->
    <div class="offcanvas-header d-flex justify-content-between">
        <h5 class="offcanvas-title">Messaging</h5>
        <div class="d-flex">
            <!-- New chat box open button -->
            <a href="index.html#" class="btn btn-secondary-soft-hover py-1 px-2">
                <i class="bi bi-pencil-square"></i>
            </a>
            <!-- Chat action START -->
            <div class="dropdown">
                <a href="index.html#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots"></i>
                </a>
                <!-- Chat action menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
                    <li><a class="dropdown-item" href="index.html#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark
                            all as read</a></li>
                    <li><a class="dropdown-item" href="index.html#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting
                        </a></li>
                    <li><a class="dropdown-item" href="index.html#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable
                            notifications</a></li>
                    <li><a class="dropdown-item" href="index.html#"> <i
                                class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
                    <li><a class="dropdown-item" href="index.html#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block
                            setting</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="index.html#"> <i class="bi bi-people fa-fw pe-2"></i>Create a
                            group chat</a></li>
                </ul>
            </div>
            <!-- Chat action END -->

            <!-- Close  -->
            <a href="index.html#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas"
                aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </a>

        </div>
    </div>
    <!-- Offcanvas body START -->
    <div class="offcanvas-body pt-0 custom-scrollbar">
        <!-- Search contact START -->
        <form class="rounded position-relative">
            <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y"
                type="submit"><i class="bi bi-search fs-5"> </i></button>
        </form>
        <!-- Search contact END -->
        <ul class="list-unstyled">

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
                <!-- Avatar -->
                <div class="avatar status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Frances Guerrero </a>
                    <div class="small text-secondary text-truncate">Frances sent a photo.</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> Just now </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
                <!-- Avatar -->
                <div class="avatar status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Lori Ferguson </a>
                    <div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 1min </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar status-offline">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Samuel Bishop </a>
                    <div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 2min </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Dennis Barrett </a>
                    <div class="small text-secondary text-truncate">Happy birthday🎂</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 10min </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar avatar-story status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Judy Nguyen </a>
                    <div class="small text-secondary text-truncate">Thank you!</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 2hrs </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Carolyn Ortiz </a>
                    <div class="small text-secondary text-truncate">Greetings from Webestica.</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 1 day </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="flex-shrink-0 avatar">
                    <ul class="avatar-group avatar-group-four">
                        <li class="avatar avatar-xxs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xxs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xxs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xxs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                        </li>
                    </ul>
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="index.html#!">Frances, Lori,
                        Amanda, Lawson </a>
                    <div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 4 day </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar status-offline">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Bryan Knight </a>
                    <div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 6 day </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Louis Crawford </a>
                    <div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 1 day </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Jacqueline Miller </a>
                    <div class="small text-secondary text-truncate">No sorry, Thanks.</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 15, dec </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Amanda Reed </a>
                    <div class="small text-secondary text-truncate">Interested can share CV at.</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 18, dec </div>
            </li>

            <!-- Contact item -->
            <li class="mt-3 hstack gap-3 align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar status-online">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="">
                </div>
                <!-- Info -->
                <div class="overflow-hidden">
                    <a class="h6 mb-0 stretched-link" href="index.html#!">Larry Lawson </a>
                    <div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
                </div>
                <!-- Chat time -->
                <div class="small ms-auto text-nowrap"> 20, dec </div>
            </li>
            <!-- Button -->
            <li class="mt-3 d-grid">
                <a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
            </li>

        </ul>
    </div>
    <!-- Offcanvas body END -->
</div>
<!-- Chat sidebar END -->
