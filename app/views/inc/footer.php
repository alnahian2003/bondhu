</main> <!-- End: Main Container -->

<!-- Footer -->
<footer class="bg-dark text-white bg-gradient">
    <div class="container">
        <div class="pt-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Explore</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>" class="nav-link p-0 text-white">Home</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/features" class="nav-link p-0 text-white">Features</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/about" class="nav-link p-0 text-white">About</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/contact" class="nav-link p-0 text-white">Contact</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Get Started</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/users/login" class="nav-link p-0 text-white">Log In</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/users/signup" class="nav-link p-0 text-white">Create Account</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/users/logout" class="nav-link p-0 text-white">Log Out</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/users/profile" class="nav-link p-0 text-white">Profile</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Legal</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/privacy" class="nav-link p-0 text-white">Privacy Policy</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/toc" class="nav-link p-0 text-white">Terms & Conditions</a></li>
                        <li class="nav-item mb-2"><a href="<?= URL_ROOT; ?>/pages/tou" class="nav-link p-0 text-white">Terms of Use</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h3 class="h3">Subscribe to our newsletter</h3>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-4 border-top">
                <p>© <?php echo date("Y") . " " . SITE_NAME . " Inc."; ?> All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="link-light" href="https://github.com/alnahian2003"><i class="bi bi-github"></i></a>
                    </li>
                    <li class="ms-3">
                        <a class="link-light" href="https://facebook.com/alnahian2003"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li class="ms-3">
                        <a class="link-light" href="https://twitter.com/alnahian2003"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li class="ms-3">
                        <a class="link-light" href="https://instagram.com/alnahian2003"><i class="bi bi-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End: Footer -->

<!-- Bootstrap 5.2 -->
<script src="<?= URL_ROOT; ?>/js/bootstrap.bundle.min.js"></script>

<!-- Main JavaScript -->
<script src="<?= URL_ROOT; ?>/js/main.js"></script>

</body>

</html>