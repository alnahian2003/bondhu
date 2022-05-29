<?php
// Site Title
$site_title = "About Us";

// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3"><?= $data["title"]; ?></h1>
        <p class="lead">
            Bondhu is a simple social media platform to connect people around the world 🌎. This is actually a practice project. <br>
            Main objective of this project is to get handy with a MVC framework and learn how to work with it. This knowlege will help me later to work with Laravel or any other PHP framework, that follows MVC pattern.
            <a class='link-primary' href='https://github.com/alnahian2003/alanmvc' title='Alan MVC PHP Framework'>AlanMVC</a>
            is the core of this platform. AlanMVC is a micro MVC PHP framework.
            Both 'Bondhu' & 'AlanMVC' is made with ❤ by
            <a href='https://alnahian2003.github.io'>alnahian2003</a>
        </p>
        <br>
        <p class="lead">
            Author: <strong><a class="link-primary fw-bold" href="<?= AUTHOR_URL; ?>" target="_blank"><?= AUTHOR; ?></a></strong> <br>
            Version: <strong><?= VERSION; ?></strong> <br>
            GitHub: <strong><a class="link-dark fw-bold" href="<?= GITHUB_REPO; ?>" target="_blank"><?= SITE_NAME . " — " . SLOGAN; ?></a></strong> <br>
        </p>
    </div>
</div>


<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>