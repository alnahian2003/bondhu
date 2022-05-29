<?php
// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<div class="p-5 bg-dark bg-gradient text-white rounded">
    <div class="container">
        <div class="row d-flex flex-row justify-content-between align-items-center bs-gap-5">
            <!-- Hero Left Item (Intro) -->
            <div class="col-md-6">
                <h1 class="display-4"><?= $data["title"]; ?></h1>
                <p class="lead">Where friends get connected!</p>
                <hr class="my-2">
                <p class="lead my-4">
                    Bondhu is a simple social media platform to connect people around the world 🌎<br>
                </p>
                <p class="lead">
                    <a class="btn btn-primary bg-gradient btn-lg" href="<?= URL_ROOT; ?>/users/signup" role="button">Get Started</a>
                </p>
            </div>

            <!-- Hero Right Item (Login Form) -->
            <div class="col-md-4 text-dark">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Create an Account</h3>
                        <form action="<?php echo URL_ROOT; ?>/users/login" method="post">
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email address</label>
                                <input type="email" class="form-control mb-2" id="useremail" placeholder="example@mail.com">

                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control mb-2" id="password" placeholder="••••••">

                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <div class="text-center text-end">
                                <button type="submit" name="login" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="<?= URL_ROOT; ?>/users/signup">Create New Account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include Features Widget
include_once APP_ROOT . "/views/inc/features.php";


// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>