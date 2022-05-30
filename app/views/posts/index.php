<?php
// Site Title
$site_title = "Posts";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- Posts heading section -->
<div class="row align-items-center justify-content-between mb-2">
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
    <div class="col-md-3 sticky-top">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <!-- Create Post -->
        <div class="card card-body mb-3">
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="<?= URL_ROOT; ?>/users/profile"> <img class="avatar-img rounded-circle" src="https://social.webestica.com/assets/images/avatar/03.jpg" alt=""> </a>
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
                <li class="nav-item">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
                </li>
                <li class="nav-item dropdown ms-lg-auto">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>
        <!-- Create Post END -->

        <!-- Post Feeds from others -->
        <?php foreach ($data["posts"] as $post) : ?>
            <div class="card mb-4 border-light">
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
                                    <?= date("h:i A, D m, Y", strtotime($post->posted_at)); ?>
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
                <img src="https://images.pexels.com/photos/7325503/pexels-photo-7325503.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title; ?></h5>
                    <p class="card-text"><small class="text-muted"></small></p>
                    <p class="card-text"><?= $post->body; ?></p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Advertisement Area -->
    <div class="col-md-3">
        <div class="card link">
            <pre><?php var_dump($post); ?></pre>
        </div>
    </div>
</div>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>