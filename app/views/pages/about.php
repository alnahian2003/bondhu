<?php
// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<h1><?= $data["title"]; ?></h1>
<p class="lead"><?= $data["description"]; ?></p>
<h5>
    Author: <strong><a class="link-primary" href="<?= AUTHOR_URL; ?>" target="_blank"><?= AUTHOR; ?></a></strong> <br>
    Version: <strong><?= VERSION; ?></strong> <br>
    GitHub: <strong><a class="link-dark" href="<?= GITHUB_REPO; ?>" target="_blank"><?= SITE_NAME; ?></a></strong> <br>
</h5>
<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>