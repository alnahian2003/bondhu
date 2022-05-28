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
                <p class="lead">
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
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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