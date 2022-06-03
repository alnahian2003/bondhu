<?php
// Site Title
$site_title = "Edit Post";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>



<div class="col-md-8 justify-center-center mx-auto">
    <!-- Back Button -->
    <a href="<?= URL_ROOT; ?>/posts" class="my-3 btn btn-outline-secondary"><i class="bi bi-arrow-90deg-left"></i> Go Back</a>
    <!-- Edit Post -->
    <div class="card shadow border-light p-3 mb-3 rounded-4">
        <div class="card-body">
            <h2 class="post-title text-center fw-bold mb-2">Edit Post</h2>
            <hr class="border">
            <div class="d-flex mb-3 gap-2">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="<?= URL_ROOT; ?>/users/profile"> <img class="avatar-img rounded-circle" src="<?= $data["user"]->profile_img; ?>" alt="<?= $data["user"]->name; ?>"> </a>
                </div>
                <!-- Post input -->
                <form class="w-100" id="createPost" method="POST" action="<?= URL_ROOT . "/posts/edit/{$data['postId']}"; ?>">
                    <!-- Post Title -->
                    <div class="mb-3">
                        <label for="title" class="label fw-bold text-dark mb-2">Title (Optional)</label>
                        <input type="text" name="title" class="form-control <?= !empty($data["title_error"]) ? "is-invalid" : ''; ?>" id="title" value="<?= $data["title"]; ?>" placeholder="Keep it simple and small" maxlength="255">
                        <span class="invalid-feedback"><?= $data["title_error"]; ?></span>
                    </div>

                    <!-- Post Content -->
                    <label for="body" class="label fw-bold text-dark mb-2">Content</label>
                    <textarea class="form-control pe-4 <?= !empty($data["body_error"]) ? "is-invalid" : ''; ?>" name="body" rows="6" id="body" placeholder="Share your thoughts..."><?= $data["body"]; ?></textarea>
                    <span class="invalid-feedback"><?= $data["body_error"]; ?></span>

                    <!-- Post Image Url -->
                    <div class="collapse multi-collapse" id="postImageUrlToggler">
                        <div class="my-3">
                            <label for="post_img" class="label fw-bold text-dark mb-2">Post Image Link (Optional)</label>
                            <input type="url" name="post_img" class="form-control <?= !empty($data["post_img_error"]) ? "is-invalid" : ''; ?>" id="post_img" value="<?= $data["post_img"]; ?>" placeholder="https://example.com/image.jpg">
                            <span class="invalid-feedback"><?= $data["post_img_error"]; ?></span>
                        </div>
                    </div>

                    <!-- Post Video Url -->
                    <div class="collapse multi-collapse" id="postVideoUrlToggler">
                        <div class="my-3">
                            <label for="post_video" class="label fw-bold text-dark mb-2">Post Video Link (Optional)</label>
                            <input type="url" name="post_video" class="form-control <?= !empty($data["post_video_error"]) ? "is-invalid" : ''; ?>" id="post_video" value="<?= $data["post_video"]; ?>" placeholder="https://youtu.be/SMKPKGW083c">
                            <span class="invalid-feedback"><?= $data["post_video_error"]; ?></span>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal gap-3">
                <li class="nav-item btn bg-light bg-gradient rounded-4 shadow-sm" data-bs-toggle="collapse" data-bs-target="#postImageUrlToggler" aria-expanded="false" aria-controls="postImageUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</button>
                </li>

                <li class="nav-item btn bg-light bg-gradient rounded-4 shadow-sm" data-bs-toggle="collapse" data-bs-target="#postVideoUrlToggler" aria-expanded="false" aria-controls="postVideoUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-youtube text-danger pe-2"></i>YouTube Video</button>
                </li>
            </ul>
            <!-- Share feed toolbar END -->

            <!-- Create Post Button -->
            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3 mb-0 rounded-3" id="submit">Publish</button>
        </div>
    </div>
    <!-- Create Post END -->
</div>

<script>
    const myForm = document.getElementById("createPost");
    let submitBtn = document.getElementById("submit");

    // Create post on submit button click
    submitBtn.addEventListener("click", () => {
        myForm.submit();
    })
</script>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>