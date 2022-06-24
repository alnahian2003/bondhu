<?php
// Site Title
$site_title = "Login to Bondhu — " . SLOGAN;

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- Login Form -->
<div class="col-md-4 bg-light rounded mx-auto ">
    <div class="card bg-light bg-gradient p-3">
        <div class="card-body text-dark">
            <?php flash("signup_success"); ?>
            <h3 class="text-center mb-3 display-6">Sign In</h3>
            <form action="<?php echo URL_ROOT; ?>/users/login" method="post">

                <div class="mb-3">
                    <input type="text" name="userInput" class="form-control mb-2 <?= !empty($data["userInput_error"]) ? "is-invalid" : ''; ?>" id="userInput" placeholder="Email address or Username" value="<?= $data["userInput"]; ?>">
                    <span class="invalid-feedback"><?= $data["userInput_error"]; ?></span>

                </div>


                <div class="mb-3">
                    <input type="password" name="password" class="form-control mb-2 <?= !empty($data["password_error"]) ? "is-invalid" : ''; ?>" id="password" placeholder="Password (Min. 6 Characters)">

                    <span class="invalid-feedback"><?= $data["password_error"]; ?></span>

                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>


                <div class="text-center d-block">
                    <button type="submit" name="login" class="btn btn-primary d-block w-100 bg-gradient">Log In</button>
                </div>
            </form>
            <hr class="border">
            <div class="text-center mt-3">
                <a href="<?= URL_ROOT; ?>/users/signup">New to Bondhu? Sign Up</a>
            </div>
        </div>
    </div>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>