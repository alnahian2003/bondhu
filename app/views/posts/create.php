<?php
// Site Title
$site_title = "Create Post";

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
    <!-- Create Post -->
    <div class="card shadow border-light p-3 mb-3 rounded-4">
        <div class="card-body">
            <h2 class="post-title text-center fw-bold mb-2">Create a Post</h2>
            <hr class="border">
            <div class="d-flex mb-3 gap-2">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="<?= URL_ROOT; ?>/users/profile"> <img class="avatar-img rounded-circle" src="https://scontent.fdac145-1.fna.fbcdn.net/v/t39.30808-6/242073087_731008314964760_5404138908030348238_n.jpg?stp=dst-jpg_s640x640&_nc_cat=110&ccb=1-7&_nc_sid=174925&_nc_eui2=AeEOm_0e4g1x6Rpx26oQSKQlATCnuWcS2dsBMKe5ZxLZ2y2QiZaxSsZ-iZakYf1vPz7LDhEcnrhSp1HatOg3c3kw&_nc_ohc=yZUHouOJFg8AX-xE8eM&_nc_ht=scontent.fdac145-1.fna&oh=00_AT8t5qQnP17Ttfc1yNu5pOEZZdt3_Liofbb9fkVH5kyCNw&oe=629910F5" alt=""> </a>
                </div>
                <!-- Post input -->
                <form class="w-100" id="createPost" method="POST" action="<?= URL_ROOT; ?>/posts/create">
                    <!-- Post Title -->
                    <div class="mb-3">
                        <label for="title" class="label fw-bold text-dark mb-2">Title (Optional)</label>
                        <input type="text" name="title" class="form-control <?= !empty($data["title_error"]) ? "is-invalid" : ''; ?>" id="title" value="<?= $data["title"]; ?>" maxlength="255">
                        <span class="invalid-feedback"><?= $data["title_error"]; ?></span>
                    </div>

                    <!-- Post Content -->
                    <label for="body" class="label fw-bold text-dark mb-2">Content</label>
                    <textarea class="form-control pe-4 <?= !empty($data["body_error"]) ? "is-invalid" : ''; ?>" rows="6" data-autoresize="" placeholder="Share your thoughts..."><?= $data["body"]; ?></textarea>
                    <span class="invalid-feedback"><?= $data["body_error"]; ?></span>

                    <!-- Post Image Url -->
                    <div class="collapse multi-collapse" id="postImageUrlToggler">
                        <div class="my-3">
                            <label for="title" class="label fw-bold text-dark mb-2">Post Image Link (Optional)</label>
                            <input type="url" name="post_img" class="form-control <?= !empty($data["post_img_error"]) ? "is-invalid" : ''; ?>" id="post_img" value="<?= $data["post_img"]; ?>" placeholder="https://example.com/image.jpg">
                            <span class="invalid-feedback"><?= $data["post_img_error"]; ?></span>
                        </div>
                    </div>

                    <!-- Post Image Url -->
                    <div class="collapse multi-collapse" id="postVideoUrlToggler">
                        <div class="my-3">
                            <label for="title" class="label fw-bold text-dark mb-2">Post Video Link (Optional)</label>
                            <input type="url" name="post_img" class="form-control <?= !empty($data["post_img_error"]) ? "is-invalid" : ''; ?>" id="post_img" value="<?= $data["post_img"]; ?>" placeholder="https://youtu.be/SMKPKGW083c">
                            <span class="invalid-feedback"><?= $data["post_img_error"]; ?></span>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal gap-3">
                <li class="nav-item btn bg-light bg-gradient rounded-4" data-bs-toggle="collapse" data-bs-target="#postImageUrlToggler" aria-expanded="false" aria-controls="postImageUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</button>
                </li>

                <li class="nav-item btn bg-light bg-gradient rounded-4" data-bs-toggle="collapse" data-bs-target="#postVideoUrlToggler" aria-expanded="false" aria-controls="postVideoUrlToggler">
                    <button class="nav-link py-1 px-2 mb-0"> <i class="bi bi-camera-reels-fill text-danger pe-2"></i>Video</button>
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
    // Show alert before dismissing the tab or refresh the page after writing something
    let formChanged = false;
    const myForm = document.getElementById("createPost");
    myForm.addEventListener('change', () => formChanged = true);
    window.addEventListener('beforeunload', (event) => {
        if (formChanged) {
            event.returnValue = 'You have unfinished changes!';
        }
    });

    // Create post on submit button click
    let submitBtn = document.getElementById("submit");

    submitBtn.addEventListener("click", () => {
        myForm.submit();
    })
</script>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>