<?php
// Site Title
$site_title = "Edit Profile — {$data['user']->name}";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<pre>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        print_r($_POST);
        echo "<br>";
        print_r($_FILES);
    }
    ?>
</pre>

<div class="col-md-8 d-flex justify-content-between mx-auto mb-3">
    <!-- Back to Profile Button -->
    <a href="<?= URL_ROOT; ?>/profile" class="my-3 btn btn-outline-secondary"><i class="bi bi-person-circle"></i> Profile</a>

    <!-- Back Button -->
    <a href="<?= URL_ROOT; ?>/profile/settings" class="my-3 btn btn-primary"><i class="bi bi-gear"></i> Settings</a>
</div>

<!-- Edit Profile Form -->
<div class="col-md-8 mx-auto">
    <h1>Edit Profile</h1>
    <p class="form-text text-muted">
        Edit your public profile informations such as Profile Picture, Username, Bio, About, Location, etc.
    </p>
    <form action="<?= URL_ROOT; ?>/profile/edit/" method="POST" class="mb-3" enctype="multipart/form-data">

        <!-- Profile Image -->
        <div class="row g-2 my-2 d-flex align-items-end">
            <!-- Preview of profile image -->
            <div class="text-center">
                <label for="formFileLg" class="form-label">
                    <?php if (!empty($data["user"]->profile_img)) : ?>
                        <!-- Current Profile Picture -->
                        <div class="avatar avatar-xxl mb-3">
                            <img class="avatar-img rounded-circle border border-white border-3" src="<?= $data["user"]->profile_img ?>" alt="<?= $data["user"]->name ?>">
                        </div>
                    <?php endif; ?>
                </label>
            </div>

            <!-- Upload Profile Image -->
            <div class="col-md mx-auto">
                <label for="formFileLg" class="form-label form-text text-muted">Upload a Profile Picture</label>
                <input class="form-control form-control-lg" name="profile_img" id="formFileLg" type="file">
            </div>
        </div>

        <hr class="hr">

        <!-- Username & email address -->
        <div class="row g-2 my-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username123" value="<?= $data["user"]->username; ?>">
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@yourmai.com" value="<?= $data["user"]->email; ?>">
                    <label for="email">Email Address</label>
                </div>
            </div>
        </div>

        <!-- Bio -->
        <div class="row g-2 my-2">
            <div class="col-md">
                <div class="form-floating">
                    <textarea class="form-control" rows="60" name="bio" placeholder="Write your bio" id="bio"><?= $data["user"]->bio; ?></textarea>
                    <label for="bio">Bio</label>
                </div>
            </div>
        </div>

        <hr class="hr">

        <!-- Company Name and Location -->
        <div class="row g-2 my-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="company_name" value="<?= $data["user"]->company_name; ?>">
                    <label for="company_name"><i class="bi bi-briefcase me-1"></i> Workplace</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" name="location" id="location" placeholder="location" value="<?= $data["user"]->location; ?>">
                    <label for="location"><i class="bi bi-geo-alt me-1"></i> Location</label>
                </div>
            </div>
        </div>

        <!-- Date of Birth and Status -->
        <div class="row g-2 my-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= $data["user"]->birthdate; ?>">
                    <label for="company_name"><i class="bi bi-calendar-date me-1"></i> Date of Birth</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-control" name="relationship" id="relationship">
                        <option disabled selected>Select a Status</option>

                        <option value="Single" <?php if ($data["user"]->relationship === "Single") {
                                                    echo "selected";
                                                } ?>>Single</option>

                        <option value="Married" <?php if ($data["user"]->relationship === "Married") {
                                                    echo "selected";
                                                } ?>>Married</option>

                        <option value="Complicated" <?php if ($data["user"]->relationship === "Complicated") {
                                                        echo "selected";
                                                    } ?>>Complicated</option>

                        <option value="Other" <?php if ($data["user"]->relationship === "Other") {
                                                    echo "selected";
                                                } ?>>Other</option>
                    </select>

                    <label for="relationship"><i class="bi bi-heart me-1"></i> Status</label>
                </div>
            </div>
        </div>

        <button class="btn btn-lg btn-primary mx-auto w-100 mt-3" type="submit">Edit Profile</button>
    </form>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>

<!-- 

TODO: Validate the edit form and process it perfectly
 -->