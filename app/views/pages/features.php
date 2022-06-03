<?php
// Site Title
$site_title = "Our Features";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>
<div class="p-5 bg-dark bg-gradient text-white rounded text-center h-100">
    <div class="container">
        <div class="row d-flex flex-row justify-content-between align-items-center bs-gap-5">
            <!-- Hero Left Item (Intro) -->
            <div class="col-xl-12">
                <h1 class="display-2">Simple | Easy | Friendly</h1>
                <p class="lead py-3">
                    Learn About Our Features, Before You Surf In 🏄‍♂️ <br><br>
                    Bondhu is a simple social media platform to connect people around the world 🌎
                </p>

                <a class="btn btn-primary bg-gradient btn-lg" href="<?= URL_ROOT; ?>/users/signup" role="button">Get Started</a>
            </div>
        </div>
    </div>
</div>

<!-- Features Panel -->
<div class="container px-4 py-5">
    <h2 class="pb-2 text-center display-4">Features</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <div class="col d-flex align-items-start">
            <i class="bi text-dark bi-emoji-smile text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Simple</h4>
                <p>Bondhu is simplified with less critical features. Just login and share ideas!</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-emoji-heart-eyes text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Elegant</h4>
                <p>Bondhu has a very elegant look and modern UI to make you feel at home</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-emoji-sunglasses text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Minimal</h4>
                <p>Bondhu helps you to keep on focus with it's minimal features.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-shield-lock text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Secured</h4>
                <p>Security and Privacy isn't a joke to Bondhu at all! Bondhu cares about it</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-stars text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Easy To Use</h4>
                <p>Bondhu is super easy to use! The UI and everything explain itselt best ✔</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-x-octagon text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">100% Ad Free</h4>
                <p>Bondhu is totally free from annoying ads to provide you a better experience!</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-lightning-charge text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Free To Use</h4>
                <p>Bondhu is completely Free To Use forever! No hidden cost or anything.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-patch-check text-muted flex-shrink-0 display-6 me-3"></i>
            <div>
                <h4 class="fw-bold mb-1">Friendly</h4>
                <p>Bondhu learns from you, and try to befriend with you while you browse!</p>
            </div>
        </div>
    </div>
</div>
<!-- End: Features Panel -->
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>