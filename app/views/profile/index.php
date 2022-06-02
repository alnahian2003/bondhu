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

<div class="container">
    <div class="row g-4 mb-4">

        <!-- Main content START -->
        <div class="col-lg-12 vstack gap-4">
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
                            <a class="btn btn-primary me-2" href="<?= URL_ROOT; ?>/profile/edit" type="button"> <i class="bi bi-pencil-square pe-1"></i> Edit profile </a>
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
                        <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> ZovoTeam, ZovoZip</li>
                        <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> Dhaka, Bangladesh</li>
                        <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on <?= date("M d, Y", strtotime($data["user"]->created_at)); ?></li>
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
        </div>
        <!-- Main content END -->
    </div>

    <div class="row overflow-hidden">
        <!-- left sidebar START -->
        <div class="col-lg-4">

            <div class="row g-4">

                <!-- Card START -->
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0 p-3">
                            <h5 class="card-title"><?= "About " . $data["user"]->name; ?></h5>
                            <!-- Button modal -->
                        </div>
                        <!-- Card body START -->
                        <div class="card-body position-relative">
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
        <!-- left sidebar END -->


        <div class="col-lg-8">
            <?php flash("post_message"); ?>
            <!-- Create Post -->
            <div class="card card-body mb-3">
                <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-2">
                        <a href="<?= URL_ROOT; ?>/users/profile"> <img class="avatar-img rounded-circle" src="<?= $data["user"]->profile_img; ?>" alt="<?= $data["user"]->username; ?>"> </a>
                    </div>
                    <!-- Post input -->
                    <form class="w-100" action="<?= URL_ROOT; ?>/posts/create" method="POST" id="post">
                        <textarea name="body" class="form-control pe-4" rows="2" data-autoresize="" placeholder="Share your thoughts..."></textarea>

                        <!-- Post Image Url -->
                        <div class="collapse multi-collapse" id="postImageUrlToggler">
                            <div class="my-3">
                                <label for="post_img" class="label text-muted mb-2">Image Link</label>
                                <input type="url" name="post_img" class="form-control" id="post_img" placeholder="https://example.com/image.jpg">
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
                <button type="submit" id="create" class="w-100 btn btn-primary mt-3 mb-0 small">Post</button>
            </div>
            <!-- Create Post END -->

            <!-- Post Feeds from the User -->
            <?php foreach ($data["posts"] as $post) : ?>
                <div class="card mb-4 border-light p-2">
                    <!-- Post Author -->
                    <div class="d-flex align-items-center justify-content-between px-3">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-story me-2">
                                <a href="<?= URL_ROOT . "/profile/{$data['user']->id}" ?>"> <img class="avatar-img rounded-circle" src="<?= $data['user']->profile_img; ?>" alt="<?= $data['user']->name; ?>"> </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <div class="flex flex-column align-items-center pt-2">
                                    <a href="<?= URL_ROOT . "/profile/{$data['user']->id}" ?>">
                                        <h6 class="card-title mb-0"><?= $data['user']->name; ?></h6>
                                    </a>

                                    <p class="small">
                                        <i class="bi bi-clock"></i>
                                        <?= date("h:i A, D m, Y", strtotime($data['user']->created_at)); ?>
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
                                    <li><a class="dropdown-item" href="<?= URL_ROOT . "/posts/read/{$post->post_id}"; ?>"> <i class="bi bi-eye pe-2"></i>View Full Post</a></li>
                                    <li><a class="dropdown-item" href="<?= URL_ROOT . "/posts/edit/{$post->post_id}"; ?>"> <i class="bi bi-pencil-square pe-2"></i>Edit Post</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="<?= URL_ROOT . "/posts/delete/{$post->post_id}"; ?>"> <i class="bi bi-trash pe-2  text-danger"></i>Delete Post</a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!-- Card feed action dropdown END -->
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
            <!-- Post feed END -->
        </div>
    </div>
</div> <!-- Row END -->
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