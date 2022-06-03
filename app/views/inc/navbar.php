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
                <?php if (!isLoggedIn()) : //navbar for normal visitor
                ?>
                    <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/features" class="nav-link px-2 text-dark">Features</a></li>
                    <li class="nav-item"><a href="<?= URL_ROOT; ?>/pages/about" class="nav-link px-2 text-dark">About</a></li>

                <?php else : //navbar for logged in user 
                ?>
                    <li class="nav-item"><a href="<?= URL_ROOT; ?>/posts" class="nav-link px-2 text-dark">Posts</a></li>
                    <li class="nav-item"><a href="<?= URL_ROOT . "/profile/"; ?>" class=" nav-link px-2 text-dark">Profile</a></li>
                <?php endif; ?>
            </ul>

            <!-- Navbar CTA Button -->
            <div class="text-center">
                <?php if (!isset($_SESSION["user_id"])) : ?>
                    <a href="<?= URL_ROOT; ?>/users/login" type="button" class="btn btn-outline-secondary bg-gradient me-2">Login</a>
                    <a href="<?= URL_ROOT; ?>/users/signup" type="button" class="btn btn-success bg-gradient">Sign-up</a>
                <?php endif; ?>
            </div>
        </div>
        <?php if (isLoggedIn()) : ?>
            <!-- Profile Dropdown -->
            <div class="dropdown text-end">
                <!-- Dropdown button -->
                <a href="#" class="d-block link-secondary btn-lg text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img style="height: 2.5rem; width: 2.5rem; object-fit:cover;" class="rounded-circle" src="<?= ($data["user"]->profile_img == "default.svg") ? URL_ROOT . "/img/users/{$data["user"]->profile_img}" : "{$data["user"]->profile_img}"; ?>" alt="<?= $data["user"]->username; ?>" alt="<?= $data["user"]->username; ?>">
                </a>
                <!-- End: Dropdown button -->

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="<?= URL_ROOT . "/profile"; ?>">
                            <i class="bi bi-person m-1"></i> Profile</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?= URL_ROOT . "/profile/edit"; ?>">
                            <i class="bi bi-pencil m-1"></i> Edit Profile</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?= URL_ROOT . "/profile/settings"; ?>">
                            <i class="bi bi-gear m-1"></i> Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
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

<!-- TODO: Fix Navbar Profile Issue -->