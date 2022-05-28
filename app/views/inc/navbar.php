<nav class="navbar navbar-expand-lg bg-light mb-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="<?= URL_ROOT; ?>">Bondhu</a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/" class="nav-link px-2 text-dark">Home</a></li>
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/features" class="nav-link px-2 text-dark">Features</a></li>
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/about" class="nav-link px-2 text-dark">About</a></li>
            </ul>

            <!-- Navbar CTA Button -->
            <div class="text-end">
                <a href="<?= URL_ROOT; ?>/login" type="button" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?= URL_ROOT; ?>/signup" type="button" class="btn btn-success">Sign-up</a>
            </div>

        </div>
    </div>
</nav>