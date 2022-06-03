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
    <div class="col-md-3 d-none d-sm-block d-md-none d-lg-block">
        <div class="card overflow-hidden">
            <!-- Card body START -->
            <div class="card-body pt-0">
                <div class="text-center">
                    <!-- Avatar -->
                    <div class="avatar-lg mb-3 pt-3">
                        <img class="avatar-img rounded border border-white border-3" src="<?= ($data["user"]->profile_img == "default.svg") ? URL_ROOT . "/img/users/{$data["user"]->profile_img}" : "{$data["user"]->profile_img}"; ?>" alt="<?= $data["user"]->username; ?>" style="width:250px; height:250px; object-fit:cover;">
                    </div>
                    <!-- Info -->
                    <h5 class="mb-0"> <a href="<?= URL_ROOT; ?>/profile"><?= $data["user"]->name; ?></a> </h5>
                    <small><?= !empty($data["user"]->username) ? "@{$data["user"]->username}" : ""; ?></small>
                    <!-- <small>Web Developer at ZovoTeam</small> -->
                    <p class="mt-3"><?= $data["user"]->bio; ?></p>

                    <!-- User stat END -->
                    <small class="text-muted fw-semibold">Joined on <?= date("d M, Y", strtotime($data["user"]->created_at)); ?></small>
                </div>
            </div>
            <!-- Card body END -->
            <!-- Card footer -->
            <a class="card-footer btn btn-primary bg-primary bg-gradient text-white fw-bold text-center py-2 btn-sm w-100" href="<?= URL_ROOT; ?>/profile">View Profile </a>
        </div>
    </div>

    <div class="col-md-6">
        <?php flash("post_message"); ?>
        <!-- Create Post -->
        <div class="card card-body mb-3">
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="<?= URL_ROOT; ?>/profile"> <img class="avatar-img rounded-circle" src="<?= ($data["user"]->profile_img == "default.svg") ? URL_ROOT . "/img/users/{$data["user"]->profile_img}" : "{$data["user"]->profile_img}"; ?>" alt="<?= $data["user"]->username; ?>" alt="<?= $data["user"]->username; ?>"> </a>
                </div>
                <!-- Post input -->
                <form class="w-100" action="<?= URL_ROOT; ?>/posts/create" method="POST" id="post" enctype="multipart/form-data">
                    <textarea name="body" class="form-control pe-4" rows="2" data-autoresize="" placeholder="Share your thoughts..."></textarea>

                    <!-- Post Image -->
                    <div class="collapse multi-collapse" id="postImageUrlToggler">
                        <div class="my-3">
                            <label for="post_img" class="label text-muted mb-2">Post Image</label>
                            <input type="file" name="post_img" class="form-control" id="post_img">
                        </div>
                    </div>

                    <!-- Post Video Url -->
                    <div class="collapse multi-collapse" id="postVideoUrlToggler">
                        <div class="my-3">
                            <label for="post_video" class="label text-muted mb-2">Video Link</label>
                            <input type="url" name="post_video" class="form-control" id="post_video" placeholder="https://youtu.be/SMKPKGW083c">
                        </div>
                    </div>

                </form>
            </div>
            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal gap-3">
                <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#postImageUrlToggler" aria-expanded="false" aria-controls="postImageUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</button>
                </li>
                <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#postVideoUrlToggler" aria-expanded="false" aria-controls="postVideoUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-youtube text-danger pe-2"></i>YouTube Video</button>
                </li>
            </ul>
            <!-- Share feed toolbar END -->

            <!-- Create Post Button -->
            <button type="submit" id="create" class="btn btn-primary mt-3 mb-0 small">Create a Post</button>
        </div>
        <!-- Create Post END -->

        <!-- Post Feeds from others -->
        <?php foreach ($data["posts"] as $post) : ?>
            <div class="card mb-4 border-light p-2">
                <!-- Post Author -->
                <div class="d-flex align-items-center justify-content-between px-3">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-story me-2">
                            <a href="<?= URL_ROOT . "/profile/$post->user_id" ?>"> <img class="avatar-img rounded-circle" src="<?= ($post->profile_img == "default.svg") ? URL_ROOT . "/img/users/{$post->profile_img}" : "{$post->profile_img}"; ?>" alt="<?= $post->name; ?>"> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <div class="flex flex-column align-items-center pt-2">
                                <a href="<?= URL_ROOT . "/profile/$post->user_id" ?>">
                                    <h6 class="card-title mb-0"><?= $post->name; ?></h6>
                                </a>

                                <p class="small text-muted fw-semibold">
                                    <i class="bi bi-clock"></i>
                                    <?= date("h:i A, D m, Y", strtotime($post->post_time)); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if ($post->user_id == $_SESSION["user_id"]) : ?>
                        <!-- Card feed action dropdown START -->
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card feed action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                                <li><a class="dropdown-item" href="<?= URL_ROOT . "/posts/read/{$post->post_id}"; ?>"> <i class="bi bi-eye pe-2"></i>View Full Post</a></li>
                                <li><a class="dropdown-item" href="<?= URL_ROOT . "/posts/edit/{$post->post_id}"; ?>"> <i class="bi bi-pencil-square pe-2"></i>Edit Post</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="<?= URL_ROOT . "/posts/delete/{$post->post_id}" ?>" method="post">
                                    <button class="dropdown-item text-danger" href="<?= URL_ROOT . "/posts/delete/{$post->post_id}" ?>" type="submit">
                                        <i class="bi bi-trash fa-fw pe-2"></i>
                                        Delete Post</button>
                                </form>
                            </ul>
                        </div>
                        <!-- Card feed action dropdown END -->
                    <?php endif; ?>
                </div>

                <!-- Post Body -->
                <div class="card-body">

                    <?php if (!empty($post->title)) : ?>
                        <!-- Post title -->
                        <h5 class="card-title fw-bold text-dark"><?= $post->title; ?></h5>
                    <?php endif; ?>

                    <?php if (!empty($post->post_img)) : ?>
                        <!-- Post Image -->
                        <img src="<?= $post->post_img; ?>" class="card-img-top img-fluid rounded-3" alt="<?= $post->title; ?>" loading="lazy">
                    <?php endif; ?>

                    <?php if (!empty($post->post_video)) : ?>
                        <!-- Post YouTube -->
                        <div class="ratio ratio-16x9 card-img-top img-fluid my-3">
                            <iframe class="embed-responsive-item rounded-3" src="https://www.youtube.com/embed/<?= $post->post_video; ?>?rel=0&controls=1&autoplay=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($post->body) && (strlen($post->body) > 300)) : ?>
                        <!-- Post Body -->
                        <p class="card-text text-muted py-2"><?= substr($post->body, 0, 297) . "..."; ?></p>
                    <?php else : ?>
                        <p class="card-text text-muted py-2"><?= $post->body; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($post->body) && (strlen($post->body) > 300)) : ?>
                        <!-- Read More Button -->
                        <a href="<?= URL_ROOT . "/posts/read/{$post->post_id}"; ?>" class="btn btn-light text-dark mb-2 w-100">View Full Post</a>
                    <?php endif; ?>

                    <!-- Like, Comment, Share Panel -->
                    <ul class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1">
                        <li class="nav-item">
                            <a class="nav-link text-muted mb-0" href="#!"> <i class="bi bi-hand-thumbs-up pe-1"></i>Like</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-muted mb-0" href="#!"> <i class="bi bi-chat-square-text pe-1"></i>Comment</a>
                        </li>

                        <!-- Card share action menu START -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link text-muted mb-0" id="cardShareAction4" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction4">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                            </ul>
                        </li>
                        <!-- Card share action menu END -->
                    </ul>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <!-- Peoples Area -->
    <div class="col-md-3">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header p-3 border-0">
                <h5 class="h5 card-title mb-0">People You May Know</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Connection item START -->
                <div class="hstack gap-2 mb-3">
                    <!-- Avatar -->
                    <div class="avatar">
                        <a href="#!"><img class="avatar-img rounded-circle" src="img/users/default.svg" alt=""></a>
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
                        <a href="#!"> <img class="avatar-img rounded-circle" src="img/users/default.svg" alt=""> </a>
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

<script>
    let postForm = document.getElementById("post");

    // Create post on submit button click
    let submitBtn = document.getElementById("create");

    submitBtn.addEventListener("click", () => {
        postForm.submit();
    })
</script>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>