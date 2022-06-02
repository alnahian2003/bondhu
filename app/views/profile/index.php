<?php
// Site Title
$site_title = "{$data['user']->name} | Bondhu";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<?= print_r($data["user"]); ?>

<div class="container">
    <div class="row g-4">

        <!-- Main content START -->
        <div class="col-lg-8 vstack gap-4">
            <!-- My profile START -->
            <div class="card">
                <!-- Cover image -->
                <div class="h-200px rounded-top" style="background-image:url(https://social.webestica.com/assets/images/bg/05.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                <!-- Card body START -->
                <div class="card-body py-0">
                    <div class="d-sm-flex align-items-start text-center text-sm-start">
                        <div>
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl mt-n5 mb-3">
                                <img class="avatar-img rounded-circle border border-white border-3" <?= "src='{$data["user"]->profile_img}' alt=''{$data["user"]->name}''"; ?>>
                            </div>
                        </div>
                        <div class="ms-sm-4 mt-sm-3">
                            <!-- Info -->
                            <h1 class="mb-0 h5"><?= $data["user"]->name; ?><i class="bi bi-patch-check-fill text-success small"></i></h1>
                        </div>
                        <!-- Button -->
                        <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                            <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                            <div class="dropdown">
                                <!-- Card share action menu -->
                                <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <!-- Card share action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- List profile -->
                    <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                        <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
                        <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
                        <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26, 2019</li>
                    </ul>
                </div>
                <!-- Card body END -->
                <div class="card-footer mt-3 pt-2 pb-0">
                    <!-- Nav profile pages -->
                    <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                        <li class="nav-item"> <a class="nav-link active" href="my-profile.html"> Posts </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
                    </ul>
                </div>
            </div>
            <!-- My profile END -->

            <!-- Share feed START -->

            <!-- Share feed END -->

            <!-- Card feed item START -->

            <!-- Card feed item END -->

        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        <div class="col-lg-4">

            <div class="row g-4">

                <!-- Card START -->
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">About</h5>
                            <!-- Button modal -->
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative pt-0">
                            <p><?= (isset($data["user"]->bio) && !empty($data["user"]->bio)) ? $data["user"]->bio : "";  ?></p>
                            <!-- Date time -->
                            <ul class="list-unstyled mt-3 mb-0">
                                <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong> October 20, 1990 </strong> </li>
                                <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single </strong> </li>
                                <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> webestica@gmail.com </strong> </li>
                            </ul>
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
                <!-- Card END -->
            </div>

        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>