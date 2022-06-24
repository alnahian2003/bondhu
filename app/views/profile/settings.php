<?php
// Site Title
$site_title = "Profile Settings";

// Include Header
require APP_ROOT . "/views/inc/header.php";

$profile_image_path = ($data["user"]->profile_img == "default.svg") ? URL_ROOT . "/img/users/{$data["user"]->profile_img}" : "{$data["user"]->profile_img}";

$cover_image_path = ($data["user"]->cover_img == "cover.jpg") ? URL_ROOT . "/img/users/{$data["user"]->cover_img}" : "{$data["user"]->cover_img}";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<div class="col-md-8 d-flex justify-content-between mx-auto mb-3 text-end">
    <!-- Edit profile button -->
    <!-- Back to Profile Button -->
    <a href="<?= URL_ROOT; ?>/profile/edit" class="my-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Edit Profile</a>

    <!-- View Profile Button -->
    <a href="<?= URL_ROOT; ?>/profile" class="my-3 btn btn-outline-secondary"><i class="bi bi-person-circle"></i> View Profile</a>
</div>

<!-- Edit Profile Form -->
<div class="col-md-8 bg-white bg-gradient p-5 rounded-3 mx-auto">
    <h1>Profile Settings</h1>
    <p class="form-text text-muted">
        Control or update your profile settings like changing your name, password or deleting your account.
    </p>
    <form action="<?= URL_ROOT; ?>/profile/edit" method="POST" class="mb-3" enctype="multipart/form-data">

        <!-- Username & email address -->
        <div class="row g-2 my-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?= $data["user"]->name; ?>">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password">
                    <label for="password">Change Password</label>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary mx-auto text-center mt-3" type="submit"><i class="bi bi-gear"></i> Update Settings</button>
        </div>
    </form>

    <!-- Danger Zone -->
    <div class="row g-2 my-2">
        <?php flash("delete_account_failed"); ?>
        <form method="post">
            <input type="submit" name="delete" class="btn btn-lg btn-light border-danger text-danger bg-gradient mx-auto w-100 mt-3" onclick="return confirm('Are you sure you want to delete your account?');" value="Delete Account?">
        </form>
    </div>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>

<!-- 

TODO: Validate the edit form and process it perfectly
 -->