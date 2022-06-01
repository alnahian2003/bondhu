<nav style="--bs-bg-opacity: .70;" class="navbar navbar-expand-lg bg-light bg-gradient mb-3 fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="<?= URL_ROOT; ?>">Bondhu</a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col-12 col-lg-auto me-lg-auto mb-2 text-center mb-md-0">
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/" class="nav-link px-2 text-dark">Home</a></li>
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/features" class="nav-link px-2 text-dark">Features</a></li>
                <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/about" class="nav-link px-2 text-dark">About</a></li>
            </ul>

            <!-- Navbar CTA Button -->
            <div class="text-center">
                <?php if (!isset($_SESSION["user_id"])) : ?>
                    <a href="<?= URL_ROOT; ?>/users/login" type="button" class="btn btn-outline-secondary bg-gradient me-2">Login</a>
                    <a href="<?= URL_ROOT; ?>/users/signup" type="button" class="btn btn-success bg-gradient">Sign-up</a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (isset($_SESSION["user_id"])) : ?>
            <!-- Profile Dropdown -->
            <div class="dropdown text-end">
                <!-- Dropdown button -->
                <a href="#" class="d-block link-secondary btn-lg text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle h3 text-muted"></i>
                </a>
                <!-- End: Dropdown button -->

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="profileDropdown">
                    <li>
                        <h6 class="dropdown-header">Dropdown header</h6>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= URL_ROOT; ?>/pages/profile">
                            <i class="bi bi-person m-1"></i> Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear m-1"></i> Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Dropdown header</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?= URL_ROOT; ?>/users/logout">
                            <i class="bi bi-box-arrow-right m-1"></i> Sign out
                        </a>
                    </li>
                </ul>
                <!-- End Dropdown Menu -->
            </div>
        <?php endif; ?>
    </div>
</nav>