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
                    <a class="btn btn-primary bg-gradient btn-lg" href="<?= URL_ROOT; ?>/signup" role="button">Get Started</a>
                </p>
            </div>

            <!-- Hero Right Item (Login Form) -->
            <div class="col-md-4 text-dark">
                <div class="card">
                    <div class="card-body">
                        <h3>Create an account</h3>
                        <form>
                            <div class="mb-3">
                                <!-- Name -->
                                <label for="username" class="form-label">User Name</label>
                                <input type="name" class="form-control mb-2" id="username" placeholder="e.g. alnahian2003">
                            </div>
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email address</label>
                                <input type="email" class="form-control mb-2" id="useremail" aria-describedby="emailHelp" placeholder="example@mail.com">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control mb-2" id="password" placeholder="••••••">

                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control mb-2" id="password" placeholder="••••••">

                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <button type="submit" name="signup" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>