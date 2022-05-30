<?php
// Site Title
$site_title = "Posts";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- Posts heading section -->
<div class="row align-items-center justify-content-between mb-2">
    <div class="col-md-6 text-start">
        <h1 class="h1">Newsfeed</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= URL_ROOT; ?>/posts/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create Post
        </a>
    </div>
</div>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>