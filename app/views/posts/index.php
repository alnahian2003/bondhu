<?php
// Site Title
$site_title = "Posts";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<!-- Posts heading section -->
<div class="row align-items-center justify-content-between mb-3">
    <div class="col-md-6 text-start">
        <h1 class="h1">Newsfeed</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= URL_ROOT; ?>/posts/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create Post
        </a>
    </div>
</div>

<!-- Posts Feed -->
<div class="row">
    <!-- User Details -->
    <div class="col-md-3">
        <div class="card overflow-hidden">
            <!-- Cover image -->
            <div class="h-50px" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
            <!-- Card body START -->
            <div class="card-body pt-0">
                <div class="text-center">
                    <!-- Avatar -->
                    <div class="avatar-lg mt-n5 mb-3 px-3 pt-3">
                        <a href="#!"><img class="avatar-img rounded border border-white border-3" src="https://scontent.fdac145-1.fna.fbcdn.net/v/t39.30808-6/242073087_731008314964760_5404138908030348238_n.jpg?stp=dst-jpg_s640x640&_nc_cat=110&ccb=1-7&_nc_sid=174925&_nc_eui2=AeEOm_0e4g1x6Rpx26oQSKQlATCnuWcS2dsBMKe5ZxLZ2y2QiZaxSsZ-iZakYf1vPz7LDhEcnrhSp1HatOg3c3kw&_nc_ohc=yZUHouOJFg8AX-xE8eM&_nc_ht=scontent.fdac145-1.fna&oh=00_AT8t5qQnP17Ttfc1yNu5pOEZZdt3_Liofbb9fkVH5kyCNw&oe=629910F5" alt=""></a>
                    </div>
                    <!-- Info -->
                    <h5 class="mb-0"> <a href="#!">Al Nahian </a> </h5>
                    <small>Web Developer at ZovoTeam</small>
                    <p class="mt-3">I'd love to change the world, but they won't give me the source code.</p>

                    <!-- User stat START -->
                    <div class="hstack gap-2 gap-xl-3 justify-content-center">
                        <!-- User stat item -->
                        <div>
                            <h6 class="mb-0">256</h6>
                            <small>Post</small>
                        </div>
                        <!-- Divider -->
                        <div class="vr"></div>
                        <!-- User stat item -->
                        <div>
                            <h6 class="mb-0">2.5K</h6>
                            <small>Followers</small>
                        </div>
                        <!-- Divider -->
                        <div class="vr"></div>
                        <!-- User stat item -->
                        <div>
                            <h6 class="mb-0">365</h6>
                            <small>Following</small>
                        </div>
                    </div>
                    <!-- User stat END -->
                </div>
            </div>
            <!-- Card body END -->
            <!-- Card footer -->
            <div class="card-footer bg-primary text-center py-2">
                <a class="btn btn-primary btn-sm" href="my-profile.html">View Profile </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <!-- Create Post -->
        <div class="card card-body mb-3">
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="<?= URL_ROOT; ?>/users/profile"> <img class="avatar-img rounded-circle" src="https://scontent.fdac145-1.fna.fbcdn.net/v/t39.30808-6/242073087_731008314964760_5404138908030348238_n.jpg?stp=dst-jpg_s640x640&_nc_cat=110&ccb=1-7&_nc_sid=174925&_nc_eui2=AeEOm_0e4g1x6Rpx26oQSKQlATCnuWcS2dsBMKe5ZxLZ2y2QiZaxSsZ-iZakYf1vPz7LDhEcnrhSp1HatOg3c3kw&_nc_ohc=yZUHouOJFg8AX-xE8eM&_nc_ht=scontent.fdac145-1.fna&oh=00_AT8t5qQnP17Ttfc1yNu5pOEZZdt3_Liofbb9fkVH5kyCNw&oe=629910F5" alt=""> </a>
                </div>
                <!-- Post input -->
                <form class="w-100">
                    <textarea class="form-control pe-4 border-light" rows="2" data-autoresize="" placeholder="Share your thoughts..."></textarea>
                </form>
            </div>
            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal gap-3">
                <li class="nav-item">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                </li>
                <li class="nav-item dropdown ms-lg-auto">
                    <a class="text-secondary rounded bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Share feed toolbar END -->

            <!-- Create Post Button -->
            <a href="#!" class="btn btn-primary mt-3 mb-0 small">Create a Post</a>
        </div>
        <!-- Create Post END -->

        <!-- Post Feeds from others -->
        <?php foreach ($data["posts"] as $post) : ?>
            <div class="card mb-4 border-light p-2">
                <!-- Post Author -->
                <div class="d-flex align-items-center justify-content-between p-3">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-story me-2">
                            <a href="<?= URL_ROOT . "/profile/$post->user_id" ?>"> <img class="avatar-img rounded-circle" src="<?= $post->profile_img; ?>" alt="<?= $post->name; ?>"> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <div class="flex flex-column align-items-center pt-2">
                                <h6 class="card-title mb-0"> <a href="<?= URL_ROOT . "/profile/$post->user_id" ?>"><?= $post->name; ?></a></h6>

                                <p class="small">
                                    <i class="bi bi-clock"></i>
                                    <?= date("h:i A, D m, Y", strtotime($post->post_time)); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card feed action dropdown START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card feed action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                        </ul>
                    </div>
                    <!-- Card feed action dropdown END -->
                </div>

                <a href="#!" class="post-img px-3">
                    <img src="<?= $post->post_img; ?>" class="card-img-top img-fluid rounded-3" alt="<?= $post->title; ?>">
                </a>
                <div class="card-body">
                    <!-- Post title -->
                    <h5 class="card-title fw-bold text-dark"><?= $post->title; ?></h5>

                    <!-- Post Body -->
                    <p class="card-text text-muted"><?= $post->body; ?></p>

                </div>

                <!-- Read More Button -->
                <a href="<?= URL_ROOT . "/posts/details/{$post->id}"; ?>" class="btn btn-light text-dark mx-3 my-2 small">Read More</a>


            </div>
        <?php endforeach; ?>
    </div>

    <!-- Peoples Area -->
    <div class="col-md-3">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header px-3 py-3 border-0">
                <h5 class="h5 card-title mb-0">People You May Know</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Connection item START -->
                <div class="hstack gap-2 mb-3">
                    <!-- Avatar -->
                    <div class="avatar">
                        <a href="#!"><img class="avatar-img rounded-circle" src="https://scontent.fdac145-1.fna.fbcdn.net/v/t39.30808-1/279795680_1441069229659108_4281890619985583931_n.jpg?stp=c39.34.258.257a_dst-jpg_p320x320&_nc_cat=109&ccb=1-7&_nc_sid=7206a8&_nc_eui2=AeFJwsQbcERKjlx1Y3xWEpj1Gl5070GyfsAaXnTvQbJ-wPLGQ6KlXNm7jnHIF8oqJ-5kyQEZba0QxJGlW0K0Uv4J&_nc_ohc=hEZ3JLrrGkEAX-3ufIf&_nc_ht=scontent.fdac145-1.fna&oh=00_AT-8Hs8-QqB_8vN8dNWHAvhnm8EfptyHpQqmeJaHOhVU7Q&oe=6299ED63" alt=""></a>
                    </div>
                    <!-- Title -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">Mahamud Hasan </a>
                        <p class="mb-0 small text-truncate">CEO, ZovoTeam</p>
                    </div>
                    <!-- Button -->
                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="bi bi-person-plus"> </i></a>
                </div>
                <!-- Connection item END -->
                <!-- Connection item START -->
                <div class="hstack gap-2 mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-story">
                        <a href="#!"> <img class="avatar-img rounded-circle" src="https://scontent.fdac145-1.fna.fbcdn.net/v/t1.6435-1/136949813_763137184292303_8322722208065402922_n.jpg?stp=dst-jpg_p320x320&_nc_cat=107&ccb=1-7&_nc_sid=7206a8&_nc_eui2=AeHMaKW6IFTxK42OpwZDOZXCOjf5b7BMRaA6N_lvsExFoA8AcKSRhUroZHWJifmTBqyqnuh97vdD6n32jm5_Vced&_nc_ohc=2nm9Vt6nSyYAX-J4Peu&_nc_ht=scontent.fdac145-1.fna&oh=00_AT_dL2qRKP4__-Crmm1z4jG5AVynjta1NHqkp5qkaP9TRA&oe=62BA9945" alt=""> </a>
                    </div>
                    <!-- Title -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">Mehbub Rabu</a>
                        <p class="mb-0 small text-truncate">Web Developer</p>
                    </div>
                    <!-- Button -->
                    <a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i class="bi bi-person-check"> </i></a>
                </div>
                <!-- Connection item END -->

                <!-- View more button -->
                <div class="d-grid mt-3">
                    <a class="btn btn-sm btn-light" href="#!">View more</a>
                </div>
            </div>
            <!-- Card body END -->
        </div>
    </div>
</div>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>