<?php
// Site Title
$site_title = "Full Post";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<div class="col-sm-8 card card-body mx-auto">
    <!-- Post Feeds from others -->
    <div class="mb-4 border-light p-2">
        <!-- Post Author -->
        <div class="d-flex align-items-center justify-content-between px-3">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                    <a href="<?= URL_ROOT . "/profile/" . $data["user"]->user_id; ?>"> <img class="avatar-img rounded-circle" src="<?= $data["user"]->profile_img; ?>" alt="<?= $data["user"]->name; ?>"></a>
                </div>
                <!-- Info -->
                <div>
                    <div class="flex flex-column align-items-center pt-2">
                        <a href="<?= URL_ROOT . "/profile/" . $data["user"]->user_id; ?>">
                            <h6 class="card-title mb-0"><?= $data["user"]->name; ?></h6>
                        </a>

                        <p class="small">
                            <i class="bi bi-clock"></i>
                            <?= date("h:i A, D m, Y", strtotime($data["post"]->posted_at)); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card feed action dropdown START -->
            <div class="dropdown">
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots"></i>
                </a>
                <?php if ($data["user"]->id == $_SESSION["user_id"]) : ?>
                    <!-- Card feed action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square pe-2"></i>Edit post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow <?= $data["user"]->name; ?> </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete Post</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <!-- Card feed action dropdown END -->
        </div>

        <div class="card-body">

            <?php if (!empty($data["post"]->title) && empty($data["post"]->title_error)) : ?>
                <!-- Post title -->
                <h5 class="card-title fw-bold text-dark"><?= $data["post"]->title; ?></h5>
            <?php endif; ?>

            <?php if (!empty($data["post"]->post_img) && empty($data["post"]->post_img_error)) : ?>
                <!-- Post Image -->
                <img src="<?= $data["post"]->post_img; ?>" class="card-img-top img-fluid rounded-3" alt="<?= $data["post"]->id; ?>">
            <?php endif; ?>

            <?php if (!empty($data["post"]->post_video) && empty($data["post"]->post_video_error)) : ?>
                <!-- Post YouTube -->
                <div class="ratio ratio-16x9 card-img-top img-fluid my-3">
                    <iframe class="embed-responsive-item rounded-3" src="https://www.youtube.com/embed/<?= $data["post"]->post_video; ?>?rel=0&controls=1&autoplay=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endif; ?>

            <?php if (!empty($data["post"]->body) && empty($data["post"]->body_error)) : ?>
                <!-- Post Body -->
                <p class="card-text text-muted"><?= $data["post"]->body; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>