<?php
// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- Login Form -->
<div class="col-md-4 bg-light rounded mx-auto ">
    <div class="card bg-light bg-gradient p-3">
        <div class="card-body text-dark">
            <h3 class="text-center">Login</h3>
            <form action="<?php echo URL_ROOT; ?>/users/login" method="post">

                <div class="mb-3">

                    <label for="useremail" class="form-label">Email address<sup>*<sup></label>

                    <input type="email" name="email" class="form-control mb-2 <?= !empty($data["email_error"]) ? "is-invalid" : ''; ?>" id="useremail" aria-describedby="emailHelp" placeholder="example@mail.com" value="<?= $data["email"]; ?>">

                    <span class="invalid-feedback"><?= $data["email_error"]; ?></span>

                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password<sup>*<sup></label>

                    <input type="password" name="password" class="form-control mb-2 <?= !empty($data["password_error"]) ? "is-invalid" : ''; ?>" id="password" placeholder="••••••">

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
            <div class="text-center mt-3">
                <a href="<?= URL_ROOT; ?>/users/signup">New to Bondhu? Sign In</a>
            </div>
        </div>
    </div>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>